<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\controllers\PagamentoController;

/**
 * teste controller
 */
class TestePagseguroController extends Controller
{
    public function actionIndex()
    {   
        return $this->render('index');
    }
    
    public function actionCartao()
    {   
        return $this->render('cartao');
    }
    
    public function actionTeste()
    {
        $data = [
            //'id' => '', // identifica o pagamento - id criado dinamicamente 
            'gateway' => 'pagseguro', // pagseguro
            'forma_pag' => 'CreditCard', // OnlineDebit, Boleto, 
            'hash' => '225cbb267ff855fc250efbd95901c0afb4edfdf77e396d003abc7f5f38e5f578', // sessao
            'hash-recebedor-primario' => 'PUB21C6E9BE4D854EA7ACD6A490A27346F7', // vendedor principal key
            'hash-recebedor-secundario' => 'PUB21C6E9BE4D854EA7ACD6A490A27346F7', // vendedor secundario key
            'valor-total' => '100.00',
            'produto' => [[
                'cod'=>'0001',
                'desc'=>'Produto Teste',
                'qtd'=>'1',
                'vlr'=>'100.00'
            ]],
            'dados_comprador' => [
                'nome'=>'Eduardo Matias Pereira',
                'data-nascimento' => '26/08/1989',
                'email'=>'eduardomatias1989@sandbox.pagseguro.com.br',
                'cpf-cnpj-tipo'=>'CPF',
                'cpf-cnpj-numero'=>'003.325.992-56',
                'telefone'=>[[
                    'ddd' => '31', 
                    'numero' => '991064029', 
                ]],
                'endereco'=>[
                    'endereco-logradouro' => 'Av. Brig. Faria Lima',
                    'endereco-numero' => '1384',
                    'endereco-bairro' => 'Jardim Paulistano',
                    'endereco-cep' => '01452002',
                    'endereco-cidade' => 'São Paulo',
                    'endereco-uf' => 'SP',
                    'endereco-pais' => 'BRA',
                    'endereco-complemento' => 'apto. 114'
                ],
                'cartao' => [
                    'token' => 'b89f0d18914446438a8b4276fe9cf0bd',
                    'nome' => 'Eduardo M Pereira',
                    'num-parcela' => '1',
                    'vlr-parcela' => '100',
                ],
            ],
        ];
        
        $PagamentoController = new PagamentoController($data);
        print_r('<pre>');
        //print_r($PagamentoController->getPagamento());
        $PagamentoController->Gateway();
        
    }

}
