<?php

/**
 * This is the model class for table "department".
 *
 * The followings are the available columns in table 'department':
 * @property integer $id
 * @property string $title
 * @property integer $head_id
 *
 *
 * @property Teacher $head
 * @property Speciality[] $specialities
 */
class Department extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'department';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, head_id', 'required'),
            array('head_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 40),
            array('id, title, head_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'head'=>array(self::BELONGS_TO, 'Teacher', 'head_id'),
            'specialities'=>array(self::HAS_MANY, 'Speciality', 'department_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => Yii::t('terms','Title'),
            'head_id' => Yii::t('terms','Head'),
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('head_id', $this->head_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Department the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    private $head_old;

    protected function beforeSave() {

        if ($this->head_id != $this->head_old) {
            $auth = Yii::app()->authManager;
            $head_old_user = User::model()->findByAttributes(
                array(
                    'identity_id'=>$this->head_old,
                    'identity_type'=>User::TYPE_TEACHER
                )
            );
            $head_new_user = User::model()->findByAttributes(
                array(
                    'identity_id'=>$this->head_id,
                    'identity_type'=>User::TYPE_TEACHER
                )
            );
            if (isset($head_old_user)) {
                $auth->revoke('dephead', $head_old_user->getAttribute('id'));
            }
            if (isset($head_new_user)) {
                $auth->assign('dephead', $head_new_user->getAttribute('id'));
            }
        }

        return parent::beforeSave();
    }

    protected function afterFind() {
        $this->head_old = $this->head_id;
        return parent::afterFind();
    }
}
