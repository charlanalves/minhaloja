<?php

namespace common\modules\pagamento\controllers;

use yii\web\Controller;

class PagamentoController extends Controller
{
    public $enableCsrfValidation;
    private $data = [];    
//    function __construct($param = array()) {
//        
//        if($param){
//            $this->data['id'] = uniqid('pag_'.date('Ymd').'_');
//            foreach($param as $key => $value) {
//                $this->data[$key] = $value;
//            }
//        }
//    }
    
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $this->enableCsrfValidation = false;
        /*
         * @todo testa campos obrigatorios
         * item array: key['item_cod','item_desc','item_qtd','item_vlr']
         * gateway string: pagseguro
         * forma_pag string: CreditCard || OnlineDebit || Boleto 
         * valor_total float
         */
        $dados = (!empty(($post = \Yii::$app->request->post('dados')))) ? self::bindParam($post) : [];
        
        return $this->renderPartial(($dados)?'index':'error',['dados'=> $dados]);
    }
    
    
    // parametros padroes do checkout com parametros recebidos
    private static function bindParam($data) {

        // itens
        foreach ($data['item'] as $p) {
            $item[] = [
                $p['item_cod'] => (!empty($p['item_cod'])) ? $p['item_cod'] : '',
                $p['item_desc'] => (!empty($p['item_desc'])) ? $p['item_desc'] : '', 
                $p['item_qtd'] => (!empty($p['item_qtd'])) ? $p['item_qtd'] : '',
                $p['item_vlr'] => (!empty($p['item_vlr'])) ? $p['item_vlr'] : '',
            ];
        }
        
        return [
            // dados de configuracao
            'id' => uniqid('pag_' . date('Ymd') . '_'),
            'gateway' => $data['gateway'],
            'forma_pag' => $data['forma_pag'],  
            'hash_recebedor_primario' => '', // sessao é criada na tela de checkout
            'hash_recebedor_secundario' => $data['hash_recebedor_secundario'], // vendedor secundario key
            'valor_total' => $data['valor_total'],

            // dados do item
            'item' => [$item],

            // dados do comprador
            'comprador_nome'=> (!empty($data['comprador_nome'])) ? $data['comprador_nome'] : '',
            'comprador_data_nascimento' => (!empty($data['comprador_data_nascimento'])) ? $data['comprador_data_nascimento'] : '',
            'comprador_email'=> (!empty($data['comprador_email'])) ? $data['comprador_email'] : '',
            'comprador_cpf'=> (!empty($data['comprador_cpf'])) ? $data['comprador_cpf'] : '',
            'comprador_tel_ddd' => (!empty($data['comprador_tel_ddd'])) ? $data['comprador_tel_ddd'] : '',
            'comprador_tel_numero' => (!empty($data['comprador_tel_numero'])) ? $data['comprador_tel_numero'] : '',

            // endereco de entrega
            'endereco_logradouro' => (!empty($data['endereco_logradouro'])) ? $data['endereco_logradouro'] : '',
            'endereco_numero' => (!empty($data['endereco_numero'])) ? $data['endereco_numero'] : '',
            'endereco_bairro' => (!empty($data['endereco_bairro'])) ? $data['endereco_bairro'] : '',
            'endereco_cep' => (!empty($data['endereco_cep'])) ? $data['endereco_cep'] : '',
            'endereco_cidade' => (!empty($data['endereco_cidade'])) ? $data['endereco_cidade'] : '',
            'endereco_uf' => (!empty($data['endereco_uf'])) ? $data['endereco_uf'] : '',
            'endereco_pais' => 'BRA',
            'endereco_complemento' => (!empty($data['endereco_complemento'])) ? $data['endereco_complemento'] : '',

            // dados do cartao
            'cartao_token' => '', // token gerado na tela
            'cartao_nome' => '', // nao solicitado
            'cartao_num_parcela' => (!empty($data['cartao_num_parcela'])) ? $data['cartao_num_parcela'] : '',
            'cartao_vlr_parcela' => (!empty($data['cartao_vlr_parcela'])) ? $data['cartao_vlr_parcela'] : '',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function getPagamento()
    {
        return $this->data;
    }
    
    public function actionGateway()
    {
        //set data
        $this->setPagamento(\Yii::$app->request->post('dados'));
        
        var_dump($this->data);
        //return;
        
        //$dados = (!empty(($data = $this->data))) ? self::bindParam($data) : [];
        \Yii::$app->pagamentoComponent->{$this->data['gateway'].$this->data['forma_pag']}($this->data);
    }

    /*
     * setPagamento
     * Formata dados recebidos do formulario
     * @todo validar campos obrigatorios para fazer o checkout
     */
    private function setPagamento($dados) 
    {        
        $this->data['id'] = uniqid('pag_'.date('Ymd').'_');
        foreach($dados as $v)
            if($v['name'] == 'item')
                foreach($v['value'][0] as $k => $vv){
                    $vv = array_values($vv);
                    $this->data[$v['name']][$k]['item_qtd'] = $vv[0];
                    $this->data[$v['name']][$k]['item_cod'] = $vv[1];
                    $this->data[$v['name']][$k]['item_desc'] = $vv[2];
                    $this->data[$v['name']][$k]['item_vlr'] = $vv[3];
                }
            else
                $this->data[$v['name']] = $v['value'];
        
        //parcelas
        if(!empty($this->data['cartao_parcela'])){
            $cp = explode('-', $this->data['cartao_parcela']);
            $this->data['cartao_num_parcela'] = $cp[0];
            $this->data['cartao_vlr_parcela'] = $cp[1];
        }
            
        // telefone
        $this->data['comprador_tel_ddd'] = substr($this->data['comprador_tel'], 1, 2);
        $this->data['comprador_tel_numero'] = substr($this->data['comprador_tel'], 5);
        unset($this->data['comprador_tel']);
        
        $this->data['hash_recebedor_secundario'] = '';
        $this->data['comprador_data_nascimento'] = '26/08/1989';
        $this->data['cartao_nome'] = 'Comprador D Teste';
    }

}
