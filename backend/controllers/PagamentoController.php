<?php

namespace backend\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Response; 
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use common\models\SignupForm;

class PagamentoController extends ActiveController
{
    private $data = [
        'id' => '',         // identifica o pagamento - id criado dinamicamente 
        'gateway' => '',    // pagseguro
        'forma_pag' => '',  // OnlineDebit, Boleto, CreditCard
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
    
    function __construct($param = array()) {
        $this->data['id'] = uniqid('pag_'.date('Ymd').'_');
        foreach($param as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    /**
     * @inheritdoc
     */
    public function getPagamento()
    {
        return $this->data;
    }


    /**
     * @inheritdoc
     */
    /*
    public function setPagamento($newData)
    {
        if(!empty($newData['gateway'])){
            $this->$data['gateway'] = $newData['gateway'];
        }
        if(!empty($newData['produto'])){
            $this->$data['produto'] = $newData['produto'];
        }
        if(!empty($newData['forma_pgto'])){
            $this->$data['forma_pgto'] = $newData['forma_pgto'];
        }
        if(!empty($newData['dados_vendedor'])){
            $this->$data['dados_vendedor'] = $newData['dados_vendedor'];
        }
        if(!empty($newData['dados_comprador'])){
            $this->$data['dados_comprador'] = $newData['dados_comprador'];
        }
        if(!empty($newData['endereco_comprador'])){
            $this->$data['endereco_comprador'] = $newData['endereco_comprador'];
        }
        return;
    }
     */
    
    public static function Gateway(){
        \Yii::$app->pagamentoComponent->{$this->data['gateway']}{$this->data['forma_pag']}($this->data);
    }


}
