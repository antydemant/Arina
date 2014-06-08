<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @copyright ХПК 2014
 *
 * This is the model class for table "load".
 *
 * The followings are the available columns in table 'load':
 * @property integer $id
 * @property integer $study_year_id
 * @property integer $teacher_id
 * @property integer $group_id
 * @property integer $wp_subject_id
 * @property string $projects_hours
 * @property integer $type
 * @property integer $course
 *
 * @property StudyYear $studyYear
 *
 */
class Load extends ActiveRecord
{
    const TYPE_LECTURES = 1;
    const TYPE_PRACTS = 2;
    const TYPE_LABS = 3;


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return StudyPlan the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'load';
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array();
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'studyYear' => array(self::BELONGS_TO, 'StudyYear', 'study_year_id'),
            'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
            'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
            'planSubject' => array(self::BELONGS_TO, 'WorkSubject', 'wp_subject_id'),
        );
    }


    /**
     * @return array
     */
    public function behaviors()
    {
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'course' => 'Курс',
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

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}
