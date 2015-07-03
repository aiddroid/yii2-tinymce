<?php

namespace aiddroid\yii2tinymce;

use Yii;
use yii\web\AssetBundle;

/**
 * Description of TinyMceAsset
 *
 * @author ronghu206625
 */
class TinyMcePluginAsset extends AssetBundle
{
    public $sourcePath = '@aiddroid/yii2-tinymce/assets';
    public $js = [
    ];
    public $css = [
    ];
    public $depends = [
        //'yii\web\JqueryAsset'
    ];
}