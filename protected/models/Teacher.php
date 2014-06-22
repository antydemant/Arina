<?php

/**
 * This is the model class for table "teacher".
 *
 * The followings are the available columns in table 'teacher':
 * @property integer $id
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property string $short_name
 * @property integer $cyclic_commission_id
 *
 *
 * @property CyclicCommission $cyclicCommission
 */
class Teacher extends Employee
{
    public function getCyclicCommissionName()
    {
        return $this->cyclicCommission->title;

    }

    public static function getListByCycle($id)
    {
        /** @var CyclicCommission|null $model */
        $model = CyclicCommission::model()->findByPk($id);
        if ($model) {
            return CHtml::listData($model->teachers,'id','fullName');
        } else {
            return array();
        }
    }

    /**
     * @return array for dropDownList
     */
    public static function getList()
    {
        return CHtml::listData(self::model()->findAll(array('order' => 'last_name, middle_name, first_name')), 'id', 'fullName');
    }

    public static function getTreeList()
    {
        $list = array();
        /**
         * @var CyclicCommission[] $commission
         */
        $commission = CyclicCommission::model()->findAll();
        foreach ($commission as $item) {
            $list[$item->title] = array();
            foreach ($item->teachers as $teacher) {
                $list[$item->title][$teacher->id] = $teacher->getFullName();
            }
        }
        return $list;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Teacher the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    /**
     * @return string the associated database table name
     */
/*    public function tableName()
    {
        return 'teacher';
    }*/

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('last_name, first_name, middle_name, cyclic_commission_id', 'required'),
            array('cyclic_commission_id', 'numerical', 'integerOnly' => true),
            array('last_name, first_name, middle_name, short_name', 'length', 'max' => 25),
            array('id, last_name, first_name,  middle_name, cyclic_commission_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'group' => array(self::HAS_ONE, 'Group', 'curator_id'),
            'cyclicCommission' => array(self::BELONGS_TO, 'CyclicCommission', 'cyclic_commission_id'),
            'attestations' => array(self::HAS_MANY, 'Attestation', 'teacher_id'),
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
            'short_name' => Yii::t('teacher', 'Short name'),
            'fullName' => Yii::t('teacher', 'Full Name'),
            'cyclic_commission_id' => Yii::t('teacher', 'Cyclic Commission'),
            'cyclicCommissionName' => Yii::t('teacher', 'Cyclic Commission'),
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
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('short_name', $this->short_name, true);
        $criteria->compare('cyclic_commission_id', $this->cyclic_commission_id);

        return $criteria;
    }

    protected function afterSave()
    {
        if ($this->isNewRecord) {
            UserGenerator::generateUser($this->id, User::TYPE_TEACHER);
        }
        return parent::afterSave();
    }

    function defaultScope(){
        return array(
            'condition'=>"participates_in_study_process=1",
        );
    }

}
