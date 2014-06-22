<?php

/**
 * This is the model class for table "file_share".
 *
 * The followings are the available columns in table 'file_share':
 * @property integer $id
 * @property string $file_name
 * @property string $master_user
 */
class FileShare extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $upload_file;
    public $file_lock = false;
    public $another_master_fullname;
	public function tableName()
	{
		return 'file_share';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
            array('id', 'unique'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('file_name', 'unique'),
            array('upload_file', 'file', 'on' => 'insert'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'file_name' => Yii::t('fileShare', 'File Name'),
			'master_user' => Yii::t('fileShare', 'Master User'),
            'file_lock' => Yii::t('fileShare', 'Locked'),
            'another_master_fullname' => Yii::t('fileShare', 'Master full name')
		);
	}

    protected function beforeSave(){
        if(!parent::beforeSave())
            return false;
        if(($this->scenario=='insert' || $this->scenario=='update') &&
            ($document=CUploadedFile::getInstance($this,'upload_file'))){
            $this->deleteDocument(); // старый документ удалим, потому что загружаем новый

            $this->upload_file=$document;
            $this->upload_file->saveAs(
                Yii::getPathOfAlias('webroot.files').DIRECTORY_SEPARATOR.$this->upload_file);


        }
        return true;
    }

    protected function beforeDelete(){
        if(!parent::beforeDelete())
            return false;
        $this->deleteDocument(); // удалили модель? удаляем и файл
        return true;
    }

    public function deleteDocument(){
        $documentPath=Yii::getPathOfAlias('webroot.files').DIRECTORY_SEPARATOR.
            $this->file_name;
        if(is_file($documentPath))
            unlink($documentPath);
    }

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
