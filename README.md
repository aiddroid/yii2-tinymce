# yii2-tinymce
A Yii2 widget for TinyMce4.2.1 (Integrate with elfinder2.0 file manager)
## requirements
- mihaildev/elfinder (for efinder2.0)(https://github.com/MihailDev/yii2-elfinder)

## usage in views
```php
    echo $form->field($model, 'body')->widget(
        \aiddroid\yii2tinymce\Widget::className(),
        [
            'options' => [
                'language' => 'zh_CN',
                'selector' => 'textarea',
                'height' => 500,
                'menubar' => false,
                'plugins' => [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste imagetools elfinder"
                ],
                'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview",
            ]
        ]
    )
```

## screenshot
 ![image](https://raw.githubusercontent.com/aiddroid/yii2-tinymce/master/screenshot.jpg)
