<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.min.css',
        'css/flexslider.css',
        'css/owl.carousel.css',
        'css/style.css',
    ];
    public $js = [
        'js/easyResponsiveTabs.js',
        'js/imagezoom.js',
        'js/jquery.flexisel.js',
        'js/jquery.flexslider.js',
        'js/jquery.slide.js',
        'js/owl.carousel.js',
        'js/simpleCart.min.js',
        'js/wow.min.js',
        'js/bootstrap-3.1.1.min.js'
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
