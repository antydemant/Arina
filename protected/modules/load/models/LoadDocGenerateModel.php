<?php

/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class LoadDocGenerateModel extends CFormModel
{
    const TYPE_FULL = 'full';
    const TYPE_BY_TEACHER = 'by_teacher';
    const TYPE_BY_GROUP = 'by_group';
    const TYPE_BY_CYCLIC_COMMISSION = 'by_commission';

    public $type;
    public $yearId;
    public $teacherId;
    public $commissionId;
    public $groupId;

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);
        $this->setScenario($this->type);
    }

    public function generate()
    {
        $load = array();
        switch ($this->type) {
            case self::TYPE_FULL:
                $load = Load::model()->findAll('study_year_id = :yearId', array(':yearId' => $this->yearId));
                break;
            case self::TYPE_BY_GROUP:
                $load = Load::model()->findAll('(study_year_id = :yearId) AND (group_id = :groupId)', array(':groupId' => $this->groupId, ':yearId' => $this->yearId));
                break;
            case self::TYPE_BY_CYCLIC_COMMISSION:
                $load = Load::model()->findAll('study_year_id = :yearId', array(':yearId' => $this->yearId));
                break;
            case self::TYPE_BY_TEACHER:
                $load = Load::model()->findAll('(study_year_id = :yearId) AND (teacher_id = :teacherId)', array(':teacherId' => $this->teacherId, ':yearId' => $this->yearId));
                break;
        }

        /** @var ExcelMaker $excel */
        $excel = Yii::app()->getComponent('excel');
        $excel->getDocument($load, 'load');
    }

    public function rules()
    {
        return array(
            array('type', 'required'),
            array('teacherId, commissionId', 'required', 'on' => self::TYPE_BY_TEACHER),
            array('commissionId', 'required', 'on' => self::TYPE_BY_CYCLIC_COMMISSION),
            array('groupId', 'required', 'on' => self::TYPE_BY_GROUP),
        );
    }

    public static function getTypesList()
    {
        return array(
            self::TYPE_FULL => 'Без фільтрів',
            //  self::TYPE_BY_CYCLIC_COMMISSION => 'По цикловій комісії',
            self::TYPE_BY_TEACHER => 'По викладачу',
            self::TYPE_BY_GROUP => 'По групі',
        );
    }

    public function attributeLabels()
    {
        return array(
            'type' => 'Тип',
            'teacherId' => 'Викладач',
            'groupId' => 'Група',
            'commissionId' => 'Циклова комісія',
        );
    }
}