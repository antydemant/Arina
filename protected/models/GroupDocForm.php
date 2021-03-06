<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class GroupDocForm extends CFormModel
{
    /**
     * @var $group Group
     */
    public $group;
    public $semester;
    public $subject;
    public $year;
    public $date;
    public $teacher1;
    public $teacher2;
    public $teacher;

    public function init()
    {
        $this->date = date('d.m.Y');
    }

    public function getAttributeLabels()
    {
        return array(
            'group'=>Yii::t('base', 'Doc'),
            'teacher1'=>Yii::t('base', 'Doc'),
            'teacher2'=>Yii::t('base', 'Doc'),
        );
    }

    public function getDoc()
    {
        /**@var $excel ExcelMaker */
        $excel = Yii::app()->getComponent('excel');
        $this->subject = Subject::model()->findByPk($this->subject);
        $excel->getDocument($this, 'examSheet');
    }

    /**
     * @return int
     */
    public function getCourse()
    {
        return round($this->semester / 2) ;
    }

    public function attributeLabels()
    {
        return array(
            'date'=>Yii::t('base','Date'),
            'teacher'=>Yii::t('base','Teacher'),
            'subject'=>Yii::t('base','Subject'),
            'semester'=>Yii::t('base','Semester'),
        );
    }

    public function rules()
    {
        return array(
            array('semester','numerical','max'=>'10','min'=>'1'),
        );
    }

}