<?php

/**
 * This is the model class for table "subject".
 *
 * The followings are the available columns in table 'subject':
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property string $short_name
 * @property bool $practice
 *
 * @property SubjectRelation[] $relations
 */
class Subject extends ActiveRecord
{

    public $cycleId;
    public $specialityId;

    /**
     * @return array for dropDownList
     */
    public static function getList()
    {
        return self::getListAll('id', 'title');
    }

    /**
     * @param integer $id speciality id
     * @return array for dropDownList
     */
    public static function getListForSpeciality($id)
    {
        $list = array();
        $relations = SubjectRelation::model()->findAllByAttributes(array('speciality_id' => $id));
        foreach ($relations as $r) {
            /**@var $r SubjectRelation */
            if (!isset($list[$r->cycle->title])) {
                $list[$r->cycle->title] = array();
            }
            $list[$r->cycle->title][$r->subject_id] = $r->subject->title;
        }
        return $list;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Subject the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @param $specialityId
     * @return SubjectCycle
     */
    public function getCycle($specialityId)
    {
        /**@var $relation SubjectRelation */
        $relation = SubjectRelation::model()->findByAttributes(
            array('speciality_id' => $specialityId, 'subject_id' => $this->id)
        );
        return $relation->cycle;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'subject';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('title', 'unique'),
            array('title, code, short_name', 'required'),
            array('title, code, short_name', 'length', 'max' => 50),
            array('id, title, code, short_name, practice', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'studyPlanSubjects' => array(self::HAS_MANY, 'StudyPlanSubject', 'subject_id'),
            'relations' => array(self::HAS_MANY, 'SubjectRelation', 'subject_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => Yii::t('base', 'Title'),
            'cycle_id' => Yii::t('base', 'Subject cycles'),
            'code' => Yii::t('base', 'Code'),
            'short_name' => Yii::t('base', 'Short name'),
            'practice' => Yii::t('base', 'Practice'),
            'specialityId' => 'Спеціальність',
            'cycleId' => 'Цикл',
        );
    }
    public function attributeNames()
    {
        return CMap::mergeArray(array_keys($this->getMetaData()->columns), array('cycleId', 'specialityId'));
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('short_name', $this->short_name, true);
        $criteria->compare('relations.cycle_id', $this->cycleId);
        $criteria->compare('relations.speciality_id', $this->specialityId);

        $criteria->with = array('relations' => array('together' => true));

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 20),
        ));
    }

    protected function afterSave()
    {
        $deleted = isset(Yii::app()->session['subject']['delete']) ? Yii::app()->session['subject']['delete'] : array();
        $added = isset(Yii::app()->session['subject']['add']) ? Yii::app()->session['subject']['add'] : array();
        $relations = $this->relations;
        foreach ($added as $item) {
            /**@var SubjectRelation $item */
            $continue = false;
            foreach ($relations as $i) {
                /**@var SubjectRelation $i */
                if ($i->getId() == $item->getId()) {
                    $continue = true;
                    break;
                }
            }
            if ($continue) {
                continue;
            }
            $item->subject_id = $this->id;
            $item->save(false);
        }
        foreach ($relations as $item) {
            /**@var SubjectRelation $item */
            foreach ($deleted as $i) {
                if ($i['id'] == $item->getId()) {
                    $item->delete();
                    break;
                }
            }
        }
        return parent::afterSave();
    }

    protected function afterDelete()
    {
        foreach ($this->relations as $item) {
            $item->delete();
        }
        return parent::afterDelete();
    }
}
