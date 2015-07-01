<?php

namespace aiddroid\yii2tinymce;

use Yii;
use yii\web\AssetBundle;

/**
 * Description of TinyMceAsset
 *
 * @author ronghu206625
 */
class TinyMceAsset extends AssetBundle
{
    public $language;
    public $sourcePath = '@aiddroid/yii2-tinymce/assets';
    public $js = [
        'tinymce.min.js'
    ];
    public $css = [
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
    
    public function registerAssetFiles($view) {
        $appLanguage = strtolower(substr(Yii::$app->language , 0, 2)); //First 2 letters
        $language = $this->language ? $this->language : $appLanguage;
        
        if($language != 'en')
            $this->js[] = 'lang/' . $language . '.js';
        
        parent::registerAssetFiles($view);
    }
}