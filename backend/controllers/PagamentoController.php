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
        'id' => '', // identifica o pagamento - id criado dinamicamente 
        'gateway' => 'pagseguro', // pagseguro
        'forma-pag' => 'CreditCard', // OnlineDebit, Boleto, 
        'hash' => 'ff4d5a867bc77220c3a7ed68ca195d684942a52db79d81d308be7ee2a58b40a5', // sessao
        'hash-recebedor-primario' => '',
        'vendedor_id' => '',
        'produto' => [[
            'cod'=>'0001',
            'desc'=>'Produto Teste',
            'qtd'=>'1',
            'vlr'=>'100.00'
        ]],
        'dados_comprador' => [
            'nome'=>'Eduardo Matias Pereira',
            'data-nascimento' => '26/08/1989',
            'email'=>'eduardomatias.1989@gmail.com',
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
                'token' => 'e8f9c806d3024d6d9eb7983cf5d14383',
                'nome' => 'Eduardo M Pereira',
                'num-parcela' => '1',
                'vlr-parcela' => '100',
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
    
    public function Gateway(){
        \Yii::$app->pagamentoComponent->{$this->data['gateway'].$this->data['forma_pag']}($this->data);
    }


}
