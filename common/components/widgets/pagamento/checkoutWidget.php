<?php

namespace common\components\widgets\pagamento;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class checkoutWidget extends Widget
{
    public $dados;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('index',['dados'=>$this->dados]);
    }
}

/*

use app\common\components\widgets\pagamento\checkoutWidget;
echo checkoutWidget::widget(['dados' => $dados]);

 */