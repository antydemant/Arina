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

    public function getAttributeLabel()
    {
        return array(
            'group'=>Yii::t('base', 'Group'),
            'teacher1'=>Yii::t('base', 'Group'),
            'teacher2'=>Yii::t('base', 'Group'),
        );
    }

}