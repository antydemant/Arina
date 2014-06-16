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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('id', 'unique'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('file_name', 'unique'),
            array('upload_file', 'file', 'on' => 'create'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
//			array('id, file_name, master_user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
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

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
//	public function search()
//	{
//		// @todo Please modify the following code to remove attributes that should not be searched.
//
//		$criteria=new CDbCriteria;
//
//		$criteria->compare('id',$this->id);
//		$criteria->compare('file_name',$this->file_name,true);
//		$criteria->compare('master_user',$this->master_user,true);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FileShare the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
