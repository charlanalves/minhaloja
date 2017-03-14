<?php

namespace frontend\controllers;

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

        if (!empty(($pedido = \Yii::$app->request->get('pedido')))) {

            $Loj11Pedido = new Loj11Pedido();
            $dadosPedido = $Loj11Pedido->getPedido($pedido);

            $Loj12ProdutoPedido = new Loj12ProdutoPedido();
            $dadosProdutoPedido = $Loj12ProdutoPedido->getProdutoPedido($pedido);

            if (empty($dadosPedido[0]) || empty($dadosProdutoPedido[0])) {
                $view = 'error';
            } else {
                $param['data'] = self::dePedidoParaGateway(array_merge($dadosPedido[0], $dadosProdutoPedido[0]));
            }
        } else {
            $view = 'error';
        }
//        var_dump($param['data']);
        return $this->render($view, $param);
    }

    private static function dePedidoParaGateway($data) {
        return [
            'gateway' => $data['LOJ11_GATEWAY'],
            'forma_pag' => $data['LOJ11_FORMA_PAG'],
            'valor_total' => $data['LOJ11_VALOR'] * (int)$data['LOJ11_NUM_PARCELA'],
            'hash_recebedor_secundario' => $data['LOJ07_HASH_PAGSEGURO'],
            'item' => [[
                'item_cod' => $data['LOJ08_ID'],
                'item_desc' => $data['LOJ12_NOME_PRODUTO'],
                'item_qtd' => $data['LOJ12_QTD'],
                'item_vlr' => $data['LOJ12_VLR_UNID'],
                'item_img' => $data['LOJ10_URL'],
            ]],
            'cod_transacao' => $data['LOJ11_ID'], // sera salvo o id do pedido na transacao do gateway
            'nome_loja' => $data['LOJ07_NOME'],
            'descricao_loja' => $data['LOJ07_DESCRICAO'],
            'logo_loja' => $data['LOJ07_LOGO'],
            'telefone_loja' => $data['LOJ07_TELEFONE'],
            'email_loja' => $data['LOJ07_EMAIL'],
            'variacao_grupo' => $data['LOJ09_GRUPO'],
            'variacao_descricao' => $data['LOJ09_DESCRICAO'],
            
            'cartao_num_parcela' => $data['LOJ11_NUM_PARCELA'],
            'cartao_vlr_parcela' => $data['LOJ11_VALOR'],
        ];
    }

}
