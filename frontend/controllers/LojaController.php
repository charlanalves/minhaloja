<?php

namespace frontend\controllers;

use common\controllers\GlobalBaseController;
use common\models\Loj08Produto;
use common\models\Loj10FotoProduto;
use common\models\Loj09VariacaoProduto;
use common\models\Loj07Loja;
use common\models\Loj11Pedido;
use common\models\Loj12ProdutoPedido;

/**
 * loja controller
 */
class LojaController extends GlobalBaseController {

    public function actionIndex() {
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        $this->layout = 'smartAdmin';
        
        $idLoja = \Yii::$app->request->get('id');

        // dados da loja
        $data = Loj07Loja::findOne($idLoja)->attributes;
        foreach ($data as $k => $v) {
            \Yii::$app->view->params[$k] = $v;
        }
        
        // produtos da loja
        if(($produtos = Loj08Produto::getProdutosAtivosByLoja($idLoja))){
            foreach ($produtos as $key => $value) {
                $data['PRODUTOS'][$key] = $value->attributes;
                
                // imagens do produto
                $data['PRODUTOS'][$key]['IMAGENS'] = [];
                if(($imagens = Loj10FotoProduto::getFotosAtivasByProduto($value->attributes['LOJ08_ID']))){
                    foreach ($imagens as $k => $v) {
                        $data['PRODUTOS'][$key]['IMAGENS'][$k] = $v->attributes;
                    }
                }
                
                // variacao do produto
                $data['PRODUTOS'][$key]['VARIACAO'] = [];
                if(($variacao = Loj09VariacaoProduto::getVariacoesAgrupadasByProduto($value->attributes['LOJ08_ID']))){
                    foreach ($variacao as $k => $v) {
                        $data['PRODUTOS'][$key]['VARIACAO'][$k] = $v;
                    }
                }
            }
        }
        
        return $this->render('index', ['data' => $data]);
    }

    public function actionSave() {
     
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();
        
        try {

            $post = \Yii::$app->request->post();
            $postFormatado = self::formatDataForm($post['dados']);
            $dadosProduto = json_decode($postFormatado['JSON_DATA'], true);
//            var_dump($postFormatado);

            // salva pedido
            $pedido = new Loj11Pedido();
            $pedido->LOJ11_LOJA_ID = $dadosProduto['LOJ08_LOJA_ID'];
            $pedido->LOJ11_GATEWAY = 'pagseguro';
            $pedido->LOJ11_VALOR = $dadosProduto['LOJ08_PRECO'];
            $pedido->save();
            $idPedido = $pedido->LOJ11_ID;
            
            // salva itens pedido
            $produtoPedido = new Loj12ProdutoPedido();
            $produtoPedido->LOJ12_PEDIDO_ID = $idPedido;
            $produtoPedido->LOJ12_PRODUTO_ID = $dadosProduto['LOJ08_ID'];
            $produtoPedido->LOJ12_NOME_PRODUTO = $dadosProduto['LOJ08_NOME'];
            $produtoPedido->LOJ12_VLR_UNID = $dadosProduto['LOJ08_PRECO'];
            $produtoPedido->LOJ12_VARIACAO_ID = (empty($postFormatado['LOJ12_ID_VARIACAO'])) ? NULL : $postFormatado['LOJ12_ID_VARIACAO'];
            $produtoPedido->LOJ12_QTD = $postFormatado['LOJ12_QTD'];
            $produtoPedido->save();
            
            $transaction->commit();
            return $idPedido;
            
        } catch (\Exception $exc) {
            $transaction->rollBack();
            var_dump($exc->getMessage());
            return;   
        }

    }

}
