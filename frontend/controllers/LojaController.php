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
        
        $this->layout = 'smartAdmin';
        
        $idLoja = \Yii::$app->request->get('id');

        // dados da loja
        $data = Loj07Loja::findOne($idLoja);
        if (empty($data)){
            return $this->renderPartial('error',['dados'=> 'Loja não encontrada...']);
        }
        $data = $data->attributes;
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

            // salva pedido
            $pedido = new Loj11Pedido();
            $pedido->LOJ11_LOJA_ID = $dadosProduto['LOJ08_LOJA_ID'];
            $pedido->LOJ11_GATEWAY = 'pagseguro';
            $pedido->LOJ11_VALOR = $dadosProduto['LOJ08_PRECO'];
            $pedido->LOJ11_FRETE = Loj07Loja::getFrete($dadosProduto['LOJ08_LOJA_ID']);
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
    
    public function actionLikeProduto() {
        try {
            $session = \Yii::$app->session;
            if(empty($session->get('gostei_produtos'))){
                $session->set('gostei_produtos',[]);
            }
            
            $gostei = $session->get('gostei_produtos');
            
            $produto = \Yii::$app->request->get('produto');
            
            $Loj08Produto = Loj08Produto::findOne($produto);
            if(!empty($Loj08Produto) && !in_array($produto, $gostei)){
                $Loj08Produto->LOJ08_QTD_LIKE++;
                $Loj08Produto->save();

                $gostei[] = $produto;
                $session->set('gostei_produtos', $gostei);
            }
            
            return $Loj08Produto->LOJ08_QTD_LIKE;
            
        } catch (\Exception $exc) {
            return false;
        }

    }

}
