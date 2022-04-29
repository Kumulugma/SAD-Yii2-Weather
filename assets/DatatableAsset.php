<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class DatatableAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [ 
        'https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    ];
    public $js = [
        'node_modules/datatables.net/js/jquery.dataTables.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'app\assets\jQueryAsset',
    ];
}
