<?php
namespace backend\controllers;

use common\controllers\GlobalBaseController;
use common\models\Loj11Pedido;
use common\models\Loj12ProdutoPedido;

/**
 * checkout controller
 */
class CheckoutController extends GlobalBaseController {

    public function actionIndex() {
        
        $this->layout = 'empty';
        $view = 'index';
        $param['msg'] = "O pedido não foi encontrado no sistema.";
        
        if(!empty(($pedido = \Yii::$app->request->get('pedido')))) {        
            
            $Loj11Pedido = new Loj11Pedido();
            $dadosPedido = $Loj11Pedido->getPedido($pedido);
            
            $Loj12ProdutoPedido = new Loj12ProdutoPedido();
            $dadosProdutoPedido = $Loj12ProdutoPedido->getProdutoPedido($pedido); 
            
            if(empty($dadosPedido[0]) || empty($dadosProdutoPedido[0])){
                $view = 'error';
            } else {
                var_dump(array_merge($dadosPedido[0], $dadosProdutoPedido[0]));
                $param['data'] = self::dePedidoParaGateway(array_merge($dadosPedido[0], $dadosProdutoPedido[0]));
            }
            
        } else {
            $view = 'error';
            
        }
        var_dump($param['data']);
        return $this->render($view,$param);
    }

    private static function dePedidoParaGateway($data){
        return [
            'gateway' => $data['LOJ11_GATEWAY'],
            'forma_pag' => $data['LOJ11_FORMA_PAG'],  
            'valor_total' => $data['LOJ11_VALOR'],
            'hash_recebedor_secundario' => $data['LOJ07_HASH_PAGSEGURO'], 
            'item' => [[
                'item_cod' => $data['LOJ08_ID'],
                'item_desc' => $data['LOJ12_NOME_PRODUTO'], 
                'item_qtd' => $data['LOJ12_QTD'],
                'item_vlr' => $data['LOJ12_VLR_UNID'],
            ]],

        ];
        
    }
}
