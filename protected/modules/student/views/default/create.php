<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs = array(
    Yii::t('student', 'Students') => array('index'),
    Yii::t('base', 'Create'),
);

$this->widget(
    BoosterHelper::BUTTON_GROUP,
    array(
        'buttons' => array(
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('student', 'Students list'),
                'url' => $this->createUrl('index'),
            ),
        ),
    )
);

?>

    <h1><?php echo Yii::t('student', 'Create Student') ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>