<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class VueAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/dist';
    public $css = [
    ];
    public $js = [
        'https://cdn.jsdelivr.net/npm/vue/dist/vue.js'
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
