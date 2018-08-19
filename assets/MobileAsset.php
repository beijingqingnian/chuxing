<?php
/**
 * Created by PhpStorm.
 * User: wangxl
 * Date: 18/7/29
 * Time: 下午5:06
 */
namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class MobileAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    //public $jsOptions = ['position' => View::POS_END];
    public $css = [
        //'css/site.css',
        'css/weui.min.css',
        'css/jquery-weui.min.css'
    ];
    public $js = [
        'js/jquery-weui.min.js',
        'js/swiper.min.js',
        'js/city-picker.min.js'
    ];
    public $depends = [
        //'yii\web\JqueryAsset'
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}