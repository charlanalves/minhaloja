<?php
namespace frontend\controllers;

use common\controllers\GlobalBaseController;
use common\models\Loj11Pedido;

/**
 * checkout controller
 */
class CheckoutController extends GlobalBaseController
{
    public function actionIndex()
    {
        $view = 'index';
        
        $this->layout = null;
        if(!empty(($pedido = \Yii::$app->request->get('pedido')))) {        
            $Loj11Pedido = new Loj11Pedido();
            $param['dados'] = $Loj11Pedido->getPedido($pedido);
        
        } else {
            $param = "";
            $view = 'error';
            
        }
        
        return $this->render($view,$param);
    }
}