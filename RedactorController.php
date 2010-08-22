<?php

class RedactorController extends CExtController {
    function run($actionID) {

        if (!empty($_FILES['file']['name']) && !Yii::app()->user->isGuest) {
            $dir = Yii::getPathOfAlias('webroot.upload') . '/' . Yii::app()->user->id . '/'; // директория для загрузки изображений
            if (!is_dir($dir))
                @mkdir($dir, '0777', true);

            $image = CUploadedFile::getInstanceByName('file');
            if ($image) {
                $new_name = md5(time()) . '.' . $image->extensionName;
                $image->saveAs($dir . $new_name);
                echo '/upload/' . Yii::app()->user->id . '/' . $new_name;
            }

        }
        
    }
}
