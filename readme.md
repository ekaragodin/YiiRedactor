#Yii extension for redactor.imperavi.ru

##Install
1. Extract extension to your folder path/to/extensions/imperavi.
2. Download editor [redactor.imperavi.ru](http://redactor.imperavi.ru) and extract to path/to/extensions/imperavi/assets.
3. Add to config/main.php:
    
    'controllerMap' => array(
        'redactor' => 'application.extensions.imperavi.RedactorController',
    ),
    
##Usage

    <?php
    $this->widget('application.extensions.imperavi.redactor', array(
        'model' => $model,
        'attribute' => 'text',
        'htmlOptions' => array(
            'style' => 'width: 100%; height: 300px;',
        ),
    ));
    ?>
