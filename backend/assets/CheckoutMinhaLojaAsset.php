<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * 
 */
class CheckoutMinhaLojaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/checkout-minhaloja/base.min.css',
		'css/checkout-minhaloja/style.css',
		'css/checkout-minhaloja/custom.css'		
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
