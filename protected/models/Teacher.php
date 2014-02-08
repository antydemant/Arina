<?php

/**
 * This is the model class for table "teacher".
 *
 * The followings are the available columns in table 'teacher':
 * @property integer $id
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property integer $cyclic_commission_id
 */
class Teacher extends ActiveRecord
{
    public function getFullName()
    {
        return "$this->last_name $this->first_name $this->middle_name";
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teacher';
	}

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('last_name, first_name, middle_name, cyclic_commission_id', 'required'),
            array('cyclic_commission_id', 'numerical', 'integerOnly'=>true),
            array('last_name, first_name, middle_name', 'length', 'max'=>25),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, last_name, first_name, middle_name, cyclic_commission_id', 'safe', 'on'=>'search'),
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
            'group' => array(self::HAS_ONE, 'Group', 'curator_id'),
            'cyclicCommission' => array(self::BELONGS_TO, 'CyclicCommission', 'cyclic_commission_id'),
		);
	}

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'last_name' => Yii::t('teacher', 'Last Name'),
            'first_name' => Yii::t('teacher', 'First Name'),
            'middle_name' => Yii::t('teacher', 'Middle Name'),
            'fullName' => Yii::t('teacher', 'Full Name'),
            'cyclic_commission_id' => Yii::t('teacher', 'Cyclic Commission'),
        );
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
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('last_name',$this->last_name,true);
        $criteria->compare('first_name',$this->first_name,true);
        $criteria->compare('middle_name',$this->middle_name,true);
        $criteria->compare('cyclic_commission_id',$this->cyclic_commission_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teacher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
