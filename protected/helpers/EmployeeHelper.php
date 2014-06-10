<?php

class EmployeeHelper
{
    public static function getEducationTypes()
    {
        return array(
            '0' => Yii::t('employee', 'Basic secondary'),
            '1' => Yii::t('employee', 'Complete secondary'),
            '2' => Yii::t('employee', 'Vocational'),
            '3' => Yii::t('employee', 'Incomplete higher'),
            '4' => Yii::t('employee', 'Basic higher'),
            '5' => Yii::t('employee', 'Complete higher'),
        );
    }

    public static function getPostgraduateTypes()
    {
        return array(
            '0' => Yii::t('employee', 'Postgraduate study'),
            '1' => Yii::t('employee', 'Adjunct study'),
            '2' => Yii::t('employee', 'Doctoral study'),
        );
    }

    public static function getDismissalReasons()
    {
        return array(
            '0' => Yii::t('employee', 'Staff reductions'),
            '1' => Yii::t('employee', 'Voluntarily'),
            '2' => Yii::t('employee', 'For absenteeism'),
            '3' => Yii::t('base', 'Other'),
        );
    }
}