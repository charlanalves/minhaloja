<?php

namespace backend\controllers;

use common\controllers\GlobalBaseController;
use common\models\Loj07Loja;

/**
 * loja config controller
 */
class LojaConfigController extends GlobalBaseController {

    public function actionIndex() {
        $this->layout = 'empty';
        $session = \Yii::$app->session;
        $session['LOJ07_ID'] = 1;

        $data = Loj07Loja::findOne($session['LOJ07_ID'])->attributes;
        
        return $this->render('index', ['data' => $data]);
    }

}
