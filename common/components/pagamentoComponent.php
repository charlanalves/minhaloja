<?php

namespace common\components;

use Yii;
use yii\base\Component;
use vendor\pagseguro\Library as PagSeguro;

/**
 * PagamentoComponent
 * Classe responsavel pelas formas de pagamento
 * */
class PagamentoComponent extends Component {

    // constantes PagSeguro
    const PagSeguroAmbiente = 'sandbox'; // production or sandbox
    const PagSeguroEmail = 'eduardomatias.1989@gmail.com';
    const PagSeguroToken = '966EF525871B421D9B6536D3F2D89190';
    const PagSeguroAppID = 'app1538018632';
    const PagSeguroAppKey = 'CAD7FD497171182114F7FFB2AD3FF2D5';
    const PagseguroRedirectUrl = 'http://www.lojamodelo.com.br';
    const PagseguroNotificationUrl = 'http://www.lojamodelo.com.br/nofitication';
    

    private function pagseguroInitialize() {
        PagSeguro::initialize();
        PagSeguro::cmsVersion()->setName("Nome")->setRelease("1.0.0");
        PagSeguro::moduleVersion()->setName("Nome")->setRelease("1.0.0");
    }

    private function pagseguroSetConfigDefault(&$pag, $data) {

        // Set the Payment Mode for this payment request
        $pag->setMode('DEFAULT');

        // Set the currency
        $pag->setCurrency("BRL");

        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        if (empty($data['id'])) {
            $pag->setReference($data['id']);
        }

        // Add an item for this payment request
        // $data['produto'] -> keys[cod,desc,qtd,vlr]
        if (is_array($data['produto'])) {
            foreach ($data['produto'] as $p) {
                $pag->addItems()->withParameters(
                        $p['cod'], $p['desc'], $p['qtd'], $p['vlr']
                );
            }
        }

        // Set your customer information.
        // If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
        $pag->setSender()->setName($data['dados_comprador']['nome']);
        $pag->setSender()->setEmail($data['dados_comprador']['email']);

        // set CPF or CNPJ
        $pag->setSender()->setDocument()->withParameters(
                $data['dados_comprador']['cpf-cnpj-tipo'], // CPF or CNPJ
                $data['dados_comprador']['cpf-cnpj-numero'] // numero
        );

        // $data['telefone'] -> keys[ddd,numero]
        if (is_array($data['dados_comprador']['telefone'])) {
            foreach ($data['dados_comprador']['telefone'] as $p) {
                $pag->setSender()->setPhone()->withParameters(
                        $p['ddd'], $p['numero']
                );
            }
        }

        // hash pagseguro do remetente
        $pag->setSender()->setHash($data['hash']);

        // $pag->setSender()->setIp('127.0.0.0');
        // Set shipping information for this payment request
        $pag->setShipping()->setAddress()->withParameters(
                $data['dados_comprador']['endereco']['endereco-logradouro'], $data['dados_comprador']['endereco']['endereco-numero'], $data['dados_comprador']['endereco']['endereco-bairro'], $data['dados_comprador']['endereco']['endereco-cep'], $data['dados_comprador']['endereco']['endereco-cidade'], $data['dados_comprador']['endereco']['endereco-uf'], $data['dados_comprador']['endereco']['endereco-pais'], $data['dados_comprador']['endereco']['endereco-complemento']
        );

        // Add a primary receiver for split this payment request - vendedor key
        $pag->setSplit()->setPrimaryReceiver($data['hash-recebedor-primario']);

        // Add an receiver for split this payment request
        $pag->setSplit()->addReceiver()->withParameters(
                $data['hash-recebedor-secundario'], $data['valor-total'], 20, 0
        );
    }

    private function pagseguroSetConfigCreditCard(&$pag, $data) {

        //Set billing information for credit card
        $pag->setBilling()->setAddress()->withParameters(
                $data['dados_comprador']['endereco']['endereco-logradouro'], $data['dados_comprador']['endereco']['endereco-numero'], $data['dados_comprador']['endereco']['endereco-bairro'], $data['dados_comprador']['endereco']['endereco-cep'], $data['dados_comprador']['endereco']['endereco-cidade'], $data['dados_comprador']['endereco']['endereco-uf'], $data['dados_comprador']['endereco']['endereco-pais'], $data['dados_comprador']['endereco']['endereco-complemento']
        );

        // Set credit card token
        $pag->setToken($data['dados_comprador']['cartao']['token']);

        // Set the installment quantity and value (could be obtained using the Installments 
        // service, that have an example here in \public\getInstallments.php)
        $pag->setInstallment()->withParameters(
                $data['dados_comprador']['cartao']['num-parcela'], $data['dados_comprador']['cartao']['vlr-parcela']
        );

        // Set the credit card holder information
        $pag->setHolder()->setBirthdate($data['dados_comprador']['data-nascimento']);
        $pag->setHolder()->setName($data['dados_comprador']['cartao']['nome']); // Equals in Credit Card

        $pag->setHolder()->setPhone()->withParameters(
                $data['dados_comprador']['telefone'][0]['ddd'], $data['dados_comprador']['telefone'][0]['numero']
        );

        $pag->setHolder()->setDocument()->withParameters(
                $data['dados_comprador']['cpf-cnpj-tipo'], // CPF or CNPJ
                $data['dados_comprador']['cpf-cnpj-numero'] // mensagem de erro
        );
    }

    private function pagseguroSetConfigBoleto(&$pag, $data) {
        return;
    }

    private function pagseguroSetConfigOnlineDebit(&$pag, $data) {
        return;
    }

    private function pagseguroRegister(&$pag) {
        //Get the crendentials and register the payment
        $result = $pag->register(\vendor\pagseguro\Configuration\Configure::getApplicationCredentials());
        return $result;
    }

    // formas de pagamento [CreditCard, Boleto, OnlineDebit]
    private function pagseguroProcessCheckout($formPagamento, $data) {

        try {

            $ClassNamePagamento = '\vendor\pagseguro\Domains\Requests\DirectPayment\\' . $formPagamento;
            $metodoNameConfigPagamento = "pagseguroSetConfig" . $formPagamento;

            $this->pagseguroInitialize();
            $this->pagseguroSetConfigCredentials();
            $pag = new $ClassNamePagamento;
            $this->pagseguroSetConfigDefault($pag, $data);
            $this->{$metodoNameConfigPagamento}($pag, $data);
            $result = $this->pagseguroRegister($pag);
            $r['status'] = true;
            $r['return'] = $result;
        } catch (Exception $e) {
            $r['status'] = false;
            $r['return'] = $e->getMessage();
        }

        return $r;
    }

    // pagamento com pagseguro - CreditCard
    public function pagseguroCreditCard($data) {
        return $this->pagseguroProcessCheckout("CreditCard", $data);
    }

    // pagamento com pagseguro - Boleto
    public function pagseguroBoleto($data) {
        return $this->pagseguroProcessCheckout("Boleto", $data);
    }

    // pagamento com pagseguro - OnlineDebit
    public function pagseguroOnlineDebit($data) {
        return $this->pagseguroProcessCheckout("OnlineDebit", $data);
    }

    // Configura credenciais
    private function pagseguroSetConfigCredentials() {
        \vendor\pagseguro\Configuration\Configure::setEnvironment(self::PagSeguroAmbiente);

        \vendor\pagseguro\Configuration\Configure::setAccountCredentials(
                self::PagSeguroEmail, self::PagSeguroToken
        );

        \vendor\pagseguro\Configuration\Configure::setCharset('UTF-8'); // UTF-8 or ISO-8859-1

        \vendor\pagseguro\Configuration\Configure::setApplicationCredentials(
            self::PagSeguroAppID,
            self::PagSeguroAppKey
        );
        
        \vendor\pagseguro\Configuration\Configure::getApplicationCredentials()
                ->setAuthorizationCode('CAD7FD497171182114F7FFB2AD3FF2D5');
        
        // \vendor\pagseguro\Configuration\Configure::setLog(true, '/logpath/logFilename.log');

    }

    // cria sessao do comprador
    public function pagseguroCreateSession() {
        try {
            $this->pagseguroInitialize();
            $this->pagseguroSetConfigCredentials();
            $sessionCredentials = \vendor\pagseguro\Configuration\Configure::getAccountCredentials();
            $sessionCode = \vendor\pagseguro\Services\Session::create($sessionCredentials);
            return $sessionCode->getResult();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // cria Autorizacao para o vendedor
    public function pagseguroCreateAutorization() {
        try {
            $this->pagseguroInitialize();
            $this->pagseguroSetConfigCredentials();
            
            $authorization = new \vendor\pagseguro\Domains\Requests\Authorization();

            $authorization->setReference("AUTH_LIB_PHP_0001");
            $authorization->setRedirectUrl(self::PagseguroRedirectUr);
            $authorization->setNotificationUrl(self::PagseguroNotificationUrl);
            
            $authorization->addPermission(\vendor\pagseguro\Enum\Authorization\Permissions::CREATE_CHECKOUTS);
            $authorization->addPermission(\vendor\pagseguro\Enum\Authorization\Permissions::SEARCH_TRANSACTIONS);
            $authorization->addPermission(\vendor\pagseguro\Enum\Authorization\Permissions::RECEIVE_TRANSACTION_NOTIFICATIONS);
            $authorization->addPermission(\vendor\pagseguro\Enum\Authorization\Permissions::MANAGE_PAYMENT_PRE_APPROVALS);
            $authorization->addPermission(\vendor\pagseguro\Enum\Authorization\Permissions::DIRECT_PAYMENT);

            $response = $authorization->register(
                \vendor\pagseguro\Configuration\Configure::getApplicationCredentials()
            );
            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>
