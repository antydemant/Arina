<?php
/* @var $this DefaultController */
/* @var $model Employee */

$this->breadcrumbs = array(
    Yii::t('employee', 'Employee') => array('index'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t('base', 'Update'),
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
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('employee', 'Create an employee'),
                'url' => $this->createUrl('create'),
            ),
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('employee', 'View employee'),
                'url' => $this->createUrl('view', array('id' => $model->id)),
            ),
        ),
    )
);

?>

    <h1><?php echo $model->getFullName(); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>