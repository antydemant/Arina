<?php
/* @var $this DefaultController */
/* @var $model Employee */

$this->breadcrumbs = array(
    Yii::t('employee', 'Employees') => array('index'),
    Yii::t('base', 'Create'),
);

$this->widget(
    BoosterHelper::BUTTON_GROUP,
    array(
        'buttons' => array(
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('employee', 'Employees list'),
                'url' => $this->createUrl('index'),
            ),
        ),
    )
);

?>

    <h1><?php echo Yii::t('employee', 'Create an employee') ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>