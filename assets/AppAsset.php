<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // Файли підключаються з папки web/css
    public $css = [
        'css/site.css',
//        'css/style.css',
    ];
    public $js = [
//        'js/scripts.js',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    /*
    Якщо підключення файлів скриптів залежить від підключень якихось інших скриптів, бібліотек, то
    ми можемо у властивості $depends вказати, від чого залежать наші скрипти.
    Це забезпечує підключення файлів скриптів лише після підключення скрипту, від якого залежать інші файли скриптів.
    Якщо скрипт залежить від бібліотеки jQuery, то Yii прослідкує, щоб цей файл був підключений перед залежним скриптом.
    */
    public $depends = [
        // Тут підключається бібліотека jQuery
        'yii\web\YiiAsset',
        // Підключення стилів bootstrap
//        'yii\bootstrap5\BootstrapAsset',
        // Підключення стилів та скриптів bootstrap
        'yii\bootstrap5\BootstrapPluginAsset'
    ];
}
