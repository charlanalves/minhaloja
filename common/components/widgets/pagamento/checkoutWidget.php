<?php

namespace common\components\widgets\pagamento;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class checkoutWidget extends Widget
{
    public $data;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('index',['dados'=> self::bindParam($this->data)]);
    }
    
    // parametros padroes do checkout com parametros recebidos
    private static function bindParam($data) {

        return [
            // dados de configuracao
            'id' => uniqid('pag_' . date('Ymd') . '_'),
            'gateway' => (!empty($data['gateway'])) ? $data['gateway'] : 'pagseguro', // pagseguro padrao
            'forma_pag' => (!empty($data['gateway'])) ? $data['gateway'] : '',  
            'hash' => '', // sessao é criada na tela de checkout
            'hash-recebedor-secundario' => '', // vendedor secundario key
            'valor-total' => (!empty($data['valor-total'])) ? $data['valor-total'] : '',

            // dados do produto
            'produto' => [[
                'produto-cod' => '0001',
                'produto-desc' => 'Produto Teste', 
                'produto-qtd' => '1',
                'produto-vlr' => '100.00',
            ]],

            // dados do comprador
            'comprador-nome'=> (!empty($data['comprador-nome'])) ? $data['comprador-nome'] : '',
            'comprador-data-nascimento' => (!empty($data['comprador-data-nascimento'])) ? $data['comprador-data-nascimento'] : '',
            'comprador-email'=> (!empty($data['comprador-email'])) ? $data['comprador-email'] : '',
            'comprador-cpf'=> (!empty($data['comprador-cpf'])) ? $data['comprador-cpf'] : '',
            'comprador-tel-ddd' => (!empty($data['comprador-tel-ddd'])) ? $data['comprador-tel-ddd'] : '',
            'comprador-tel-numero' => (!empty($data['comprador-tel-numero'])) ? $data['comprador-tel-numero'] : '',

            // endereco de entrega
            'endereco-logradouro' => (!empty($data['endereco-logradouro'])) ? $data['endereco-logradouro'] : '',
            'endereco-numero' => (!empty($data['endereco-numero'])) ? $data['endereco-numero'] : '',
            'endereco-bairro' => (!empty($data['endereco-bairro'])) ? $data['endereco-bairro'] : '',
            'endereco-cep' => (!empty($data['endereco-cep'])) ? $data['endereco-cep'] : '',
            'endereco-cidade' => (!empty($data['endereco-cidad'])) ? $data['endereco-cidad'] : '',
            'endereco-uf' => (!empty($data['endereco-uf'])) ? $data['endereco-uf'] : '',
            'endereco-pais' => 'BRA',
            'endereco-complemento' => (!empty($data['endereco-complemento'])) ? $data['endereco-complemento'] : '',

            // dados do cartao
            'cartao-token' => '', // token gerado na tela
            'cartao-nome' => '',
            'cartao-num-parcela' => (!empty($data['cartao-num-parcela'])) ? $data['cartao-num-parcela'] : '',
            'cartao-vlr-parcela' => (!empty($data['cartao-vlr-parcela'])) ? $data['cartao-vlr-parcela'] : '',
        ];
    }
}

/*

use app\common\components\widgets\pagamento\checkoutWidget;
echo checkoutWidget::widget(['dados' => $dados]);

 */