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
        'yii\web\JqueryAsset'
    ];

    public function init() {

        $appLanguage = strtolower(substr(Yii::$app->language , 0, 2)); //First 2 letters

        if($appLanguage != 'en')
            $this->js[] = 'langs/' . $appLanguage . '.js';

        parent::init();
    }
}