<?php

/**
 * This is the model class for table "audience".
 *
 * The followings are the available columns in table 'audience':
 * @property integer $id
 * @property string $number
 * @property integer $type
 */
class Audience extends ActiveRecord
{
    const TYPE_LECTURE = 1;
    const TYPE_LABORATORY = 2;
    const TYPE_WORKSHOP = 3;
    const TYPE_GUM = 4;

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Audience the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string
     */
    public function getTypeName()
    {
        $list = self::getTypeList();
        return $list[$this->type];
    }

    /**
     * Array for dropDownList
     * @return array
     */
    public static function getTypeList()
    {
        return array(
            self::TYPE_LECTURE => Yii::t('audience', 'Lecture'),
            self::TYPE_LABORATORY => Yii::t('audience', 'Laboratory'),
            self::TYPE_WORKSHOP => Yii::t('audience', 'Workshop'),
            self::TYPE_GUM => Yii::t('audience', 'Gum'),
        );
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'audience';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('number, type', 'required'),
            array('type', 'numerical', 'integerOnly' => true),
            array('number', 'length', 'max' => 5),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, number, type', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'number' => Yii::t('audience', 'Number'),
            'type' => Yii::t('base', 'Type'),
            'typeName' => Yii::t('base', 'Type'),
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('number', $this->number, true);
        $criteria->compare('type', $this->type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}
