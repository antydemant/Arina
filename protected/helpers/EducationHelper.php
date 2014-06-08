<?php

class EducationHelper
{
    public static function getEducationTypes() {
        return array(
            '0' => Yii::t('education', 'Basic secondary'),
            '1' => Yii::t('education', 'Complete secondary'),
            '2' => Yii::t('education', 'Vocational'),
            '3' => Yii::t('education', 'Incomplete higher'),
            '4' => Yii::t('education', 'Complete higher'),
        );
    }
}