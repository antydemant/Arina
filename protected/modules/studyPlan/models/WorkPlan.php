<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @copyright ХПК 2014
 *
 * This is the model class for table "wp_plan".
 *
 * The followings are the available columns in table 'wp_plan':
 * @property integer $id
 * @property integer $speciality_id
 * @property array $semesters
 * @property array $graph
 * @property integer $created
 * @property integer $updated
 * @property string $year
 *
 * The followings are the available model relations:
 * @property StudySubject[] $subjects
 * @property Speciality $speciality
 */
class WorkPlan extends ActiveRecord
{
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
        return 'wp_plan';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'subjects' => array(self::HAS_MANY, 'WorkSubject', 'plan_id'),
            'speciality' => array(self::BELONGS_TO, 'Speciality', 'speciality_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'year_id' => Yii::t('terms', 'Study year'),
            'speciality_id' => Yii::t('terms', 'Speciality'),
            'created' => Yii::t('terms', 'Date of creation'),
            'updated' => Yii::t('terms', 'Date of update'),
        );
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->speciality->title . ' - ' . $this->year;
    }

} 