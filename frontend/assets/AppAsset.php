<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        '//fonts.googleapis.com/css?family=Roboto:100,300,400,700&amp;subset=cyrillic',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        'css/styles.css',
        'css/mobile.css',
    ];
    public $js = [
        '//code.jquery.com/jquery-3.4.1.min.js',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/pixi.js/5.0.3/pixi.min.js',
//         'js/script.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
