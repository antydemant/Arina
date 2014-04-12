<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class GroupDocForm extends CFormModel
{
    public $group;
    public $subject;
    public $year;
    public $teacher1;
    public $teacher2;

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
        $excel->getDocument($this->group, 'simpleGroupList');
    }

}