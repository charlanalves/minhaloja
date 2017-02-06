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
    private $data = [];    
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
    
    public function Gateway(){
        \Yii::$app->pagamentoComponent->{$this->data['gateway'].$this->data['forma_pag']}($this->data);
    }


}
