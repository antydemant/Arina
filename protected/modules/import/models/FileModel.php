<?php

class FileModel extends CFormModel
{

    public $file;

    public function rules()
    {
        return array(
            array('file', 'file', 'types' => 'xls, xlsx'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'file' => Yii::t('import', 'Оберіть електронну таблицю для імпорту даних'),
        );
    }

}