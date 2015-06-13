<?php

class EmployeeHelper
{
    public static function getEducationTypes()
    {
        return array(
            '0' => Yii::t('employee', 'Absent'),
            '1' => Yii::t('employee', 'Basic secondary'),
            '2' => Yii::t('employee', 'Complete secondary'),
            '3' => Yii::t('employee', 'Vocational'),
            '4' => Yii::t('employee', 'Incomplete higher'),
            '5' => Yii::t('employee', 'Basic higher'),
            '6' => Yii::t('employee', 'Complete higher'),
        );
    }

    public static function getPostgraduateTypes()
    {
        return array(
            '0' => Yii::t('employee', 'Absent'),
            '1' => Yii::t('employee', 'Postgraduate study'),
            '2' => Yii::t('employee', 'Adjunct study'),
            '3' => Yii::t('employee', 'Doctoral study'),
        );
    }

    public static function getDismissalReasons()
    {
        return array(
            '0' => Yii::t('employee', 'Absent'),
            '1' => Yii::t('employee', 'Staff reductions'),
            '2' => Yii::t('employee', 'Voluntarily'),
            '3' => Yii::t('employee', 'For absenteeism'),
            '4' => Yii::t('base', 'Other'),
        );
    }
}