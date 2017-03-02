<?php

namespace frontend\controllers;

use common\controllers\GlobalBaseController;
use common\models\Loj08Produto;
use common\models\Loj10FotoProduto;
use common\models\Loj09VariacaoProduto;
use common\models\Loj07Loja;

/**
 * loja controller
 */
class LojaController extends GlobalBaseController {

    public function actionIndex() {
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
        
//        try {
//            $session = \Yii::$app->session;
//            $session['LOJ07_ID'] = 1;
//            
//            $post = \Yii::$app->request->post();
//            $postFormatado = self::formatDataForm($post['dados']);
//            
//            $loja = Loj07Loja::findOne($session['LOJ07_ID']);
//            $loja->setAttributes($postFormatado);
//            $loja->save();
//            
//        } catch (\Exception $exc) {
//            var_dump($exc->getMessage());
//            
//        }

    }

}
