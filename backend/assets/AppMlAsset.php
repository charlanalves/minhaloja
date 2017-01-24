<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppMlAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/smartadmin-production-plugins.min.css',
        'css/smartadmin-production.min.css',
        'css/smartadmin-skins.min.css',
        '//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700',
        'css/site.css',
    ];
		
   
    
       public $jsOptions = [ 'position' => \yii\web\View::POS_END ];
}
