<?php
namespace aiddroid\yii2tinymce;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use aiddroid\yii2tinymce\TinyMceAsset;
use aiddroid\yii2tinymce\TinyMcePluginAsset;

class Widget extends \yii\base\Widget
{
    /**
     * @var array the options for the IinyMce.
     */
    public $options = [];

    /**
     * @var array the html options.
     */
    public $htmlOptions = [];

    /*
     * @var object model for active text area
     */
    public $model = null;

    /*
     * @var string name of textarea tag or name of attribute
     */
    public $attribute = null;

    /*
     * @var string value for text area (without model)
     */
    public $value = '';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->htmlOptions['id'])) {
            $this->htmlOptions['id'] = $this->getId();
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        if (!is_null($this->model)) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->htmlOptions);
        } else {
            echo Html::textarea($this->attribute, $this->value, $this->htmlOptions);
        }
        
        TinyMceAsset::register($this->getView())->language = $this->options['language'];
        $this->registerClientScript();
    }

    /**
     * Registers TinyMce JS
     */
    protected function registerClientScript()
    {
        $view = $this->getView();
        
        if (!isset($this->options['language']) || empty($this->options['language'])) {
            $this->options['language'] = strtolower(substr(Yii::$app->language, 0, 2));
        }

        // Insert plugins in options
        if (isset($this->options['plugins'])) {
            foreach ($this->options['plugins'] as $plugin) {
                $this->registerPlugin($plugin);
            }
        }

        $options = empty($this->options) ? '' : Json::encode($this->options);
        $js = "tinymce.init($options);";
        $view->registerJs($js);
    }

    /**
     * Registers a specific TinyMce plugin and the related events
     * @param string $name the name of the TinyMce plugin
     */
    protected function registerPlugin($name)
    {
        $asset = "TinyMcePluginAsset";
        // check exists file before register (it may be custom plugin with not standard file placement)
        $sourcePath = Yii::$app->vendorPath . '/aiddroid/yii2-tinymce/' . $asset . '.php';
        if (is_file($sourcePath)) {
            $asset::register($this->getView())->js = 'plugins/'.$name.'/plugin.min.js';
        }
    }
}