<?php
/* 
 * Виджет, позволяющий подключить визуальный редактор Redactor 5.0.2 (http://redactor.imperavi.ru) к любому полю на странице
 * @author Firs Yura (firs.yura@gmail.com) firs.org.ua
 * @author Karagodin Evgeniy (ekaragodin@gmail.com)
 * v 0.2
 */
class redactor extends CInputWidget {


    public $focus = true; // Устанавливает фокус на конкретный Редактор, особенно полезно, когда на странице несколько Редакторов.
    public $resize = true; // Включение и отключение изменения высоты Редактора
    public $toolbar = 'original'; // Указание, какой именно тулбар должен отобразиться в этом Редакторе.
    public $upload = ''; // Путь к файлу загрузки изображений.

    protected $element = array();

    public function init() {
        $baseDir = dirname(__FILE__);
        $this->upload = CHtml::normalizeUrl(array('redactor/'));
        
        $assets = Yii::app()->getAssetManager()->publish($baseDir . DIRECTORY_SEPARATOR . 'assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets . '/css/redactor.css');
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($assets . '/redactor.js');

        list($this->element['name'], $this->element['id']) = $this->resolveNameID();

        $this->focus = ($this->focus == true) ? 'true' : 'false';
        $this->resize = ($this->resize == true) ? 'true' : 'false';
        $js = "$('#" . $this->element['id'] . "').redactor({
                    focus:   " . $this->focus . ",
                    resize:  " . $this->resize . ",
                    toolbar: '" . $this->toolbar . "',
                    upload:  '" . $this->upload . "'
                });";
        $cs->registerScript('Yii.' . get_class($this), $js);
    }

    public function run() {
        $this->render('widget');
    }
}

