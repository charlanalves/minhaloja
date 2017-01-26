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
    
    public function actionTeste()
    {
        $data = [
            'id' => '',
            'gateway' => 'pagseguro',    // pagseguro
            'forma_pag' => 'Boleto',  // OnlineDebit, Boleto, CreditCard
            'hash' => '', 
            'vendedor_id' => '',
            'produto' => [[
                'cod'=>'',
                'desc'=>'',
                'qtd'=>'',
                'vlr'=>''
            ]],
            'dados_comprador' => [
                'name'=>'',
                'data-nascimento' => '',
                'email'=>'',
                'cpf-cnpj'=>'',
                'cpf-cnpj-ero'=>'Insira um numero de CPF/CNPJ valido',
                'telefone'=>[[
                    'ddd' => '', 
                    'numero' => '', 
                ]],
                'endereco'=>[
                    'endereco-logradouro' => '',
                    'endereco-numero' => '',
                    'endereco-bairro' => '',
                    'endereco-cep' => '',
                    'endereco-cidade' => '',
                    'endereco-uf' => '',
                    'endereco-complemento' => '',
                ],
                'cartao' => [
                    'token' => '',
                    'nome' => '',
                    'num-parcela' => '',
                    'vlr-parcela' => '',
                ],
            ],
        ];
        
        PagamentoController::Gateway($data);
    }

}
