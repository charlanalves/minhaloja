<?php

namespace common\components;

use Yii;
use yii\base\Component;
use PagSeguro\Library as PagSeguro;

/**
* PagamentoComponent
* Classe responsavel pelas formas de pagamento
**/
class PagamentoComponent extends Component
{
    
    private function pagseguroInitialize()
    {
        PagSeguro::initialize();
        PagSeguro::cmsVersion()->setName("Nome")->setRelease("1.0.0");
        PagSeguro::moduleVersion()->setName("Nome")->setRelease("1.0.0");
    }

    private function pagseguroSetConfigDefault(&$pag, $data)
    {
        
        $pag = new \PagSeguro\Domains\Requests\DirectPayment\Boleto();
        
        // Set the Payment Mode for this payment request
        $pag->setMode('DEFAULT');
        
        // Set the currency
        $pag->setCurrency("BRL");
        
        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        if(empty($data['id'])){
           $pag->setReference($data['id']);
        }
        
        // Add an item for this payment request
        // $data['produto'] -> keys[cod,desc,qtd,vlr]
        if(is_array($data['produto'])){
            foreach ($data['produto'] as $p) {
                $pag->addItems()->withParameters(
                    $p['cod'],
                    $p['desc'],
                    $p['qtd'],
                    $p['vlr']
                );
            }
        }
        
        // Set your customer information.
        // If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
        $pag->setSender()->setName($data['dados_comprador']['comprador']);
        $pag->setSender()->setEmail($data['dados_comprador']['email']);

        // set CPF or CNPJ
        $pag->setSender()->setDocument()->withParameters(
            $data['dados_comprador']['cpf-cnpj'], // CPF or CNPJ
            $data['dados_comprador']['cpf-cnpj-erro'] // mensagem de erro
        );
        
        // $data['telefone'] -> keys[ddd,numero]
        if(is_array($data['dados_comprador']['telefone'])){
            foreach ($data['dados_comprador']['telefone'] as $p) {
                $pag->setSender()->setPhone()->withParameters(
                    $p['ddd'],
                    $p['numero']
                );
            }
        }
        
        // hash pagseguro do remetente
        $pag->setSender()->setHash($data['hash']);
        
        // $pag->setSender()->setIp('127.0.0.0');
        
        // Set shipping information for this payment request
        $pag->setShipping()->setAddress()->withParameters(
            $data['dados_comprador']['endereco-logradouro'],
            $data['dados_comprador']['endereco-numero'],
            $data['dados_comprador']['endereco-bairro'],
            $data['dados_comprador']['endereco-cep'],
            $data['dados_comprador']['endereco-cidade'],
            $data['dados_comprador']['endereco-uf'],
            'BRA',
            $data['dados_comprador']['endereco-complemento']
        );
        
        // Add a primary receiver for split this payment request
        $pag->setSplit()->setPrimaryReceiver($data['hash-recebedor-primario']);
        
        // Add an receiver for split this payment request
        $pag->setSplit()->addReceiver()->withParameters(
            $data['hash-recebedor-secundario'],
            $data['valor-total'],
            20,
            0
        );
        
    }
    
    private function pagseguroSetConfigCreditCard(&$pag, $data)
    {
        //Set billing information for credit card
        $pag->setBilling()->setAddress()->withParameters(
            $data['dados_comprador']['endereco-logradouro'],
            $data['dados_comprador']['endereco-numero'],
            $data['dados_comprador']['endereco-bairro'],
            $data['dados_comprador']['endereco-cep'],
            $data['dados_comprador']['endereco-cidade'],
            $data['dados_comprador']['endereco-uf'],
            'BRA',
            $data['dados_comprador']['endereco-complemento']
        );

        // Set credit card token
        $pag->setToken($data['dados_comprador']['cartao-token']);

        // Set the installment quantity and value (could be obtained using the Installments 
        // service, that have an example here in \public\getInstallments.php)
        $pag->setInstallment()->withParameters(
            $data['dados_comprador']['cartao-num-parcela'], 
            $data['dados_comprador']['cartao-vlr-parcela']
        );

        // Set the credit card holder information
        $pag->setHolder()->setBirthdate($data['dados_comprador']['data-nascimento']);
        $pag->setHolder()->setName($data['dados_comprador']['cartao-nome']); // Equals in Credit Card

        $pag->setHolder()->setPhone()->withParameters(
            $data['dados_comprador']['telefone'][0]['ddd'],
            $data['dados_comprador']['telefone'][0]['numero']
        );

        $pag->setHolder()->setDocument()->withParameters(
            $data['dados_comprador']['cpf-cnpj'], // CPF or CNPJ
            $data['dados_comprador']['cpf-cnpj-erro'] // mensagem de erro
        );
    }
    
    private function pagseguroSetConfigBoleto(&$pag, $data)
    {
        return;
    }
    
    private function pagseguroSetConfigOnlineDebit(&$pag, $data)
    {
        return;
    }
    
    private function pagseguroRegister(&$pag)
    {
        //Get the crendentials and register the boleto payment
        $result = $pag->register(\PagSeguro\Configuration\Configure::getApplicationCredentials());
        return $result;
    }
    
    // formas de pagamento [CreditCard, Boleto, OnlineDebit]
    private function pagseguroProcessCheckout($formPagamento, $data)
    {
        try {
            $this->pagseguroInitialize();
            $pag = new ReflectionClass('\PagSeguro\Domains\Requests\DirectPayment\''. $formPagamento);
            $this->pagseguroSetConfigDefault($pag, $data);
            $this->pagseguroSetConfig{$formPagamento}($pag, $data);            
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
    protected function pagseguroCreditCard($data)
    {
        return $this->pagseguroProcessCheckout("CreditCard", $data);
    }
    
    // pagamento com pagseguro - Boleto
    protected function pagseguroBoleto($data)
    {
        return $this->pagseguroProcessCheckout("Boleto", $data);
    }
    
    // pagamento com pagseguro - OnlineDebit
    protected function pagseguroOnlineDebit($data)
    {
        return $this->pagseguroProcessCheckout("OnlineDebit", $data);
    }
    
}
?>
