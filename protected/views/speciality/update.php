<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    Yii::t('base', 'Specialities') => array('index'),
    $model->title => array('view', 'id' => $model->id),
    Yii::t('base', 'Updating'),
);

$this->menu = array(
    array('label' => Yii::t('speciality', 'Specialities list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('speciality', 'Create new speciality'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),

    array('label' => Yii::t('speciality', 'View speciality'), 'url' => array('view', 'id' => $model->id)),
    array(
        'label' => Yii::t('group', 'Delete group'),
        'icon' => 'trash',
        'htmlOptions' => array(
            'submit' => array(
                'delete',
                'id' => $model->id,
            ),
            'confirm' => Yii::t('base', 'Do you want to delete this item?'),
        ),
    ),
);
?>

    <h3><?php echo Yii::t('speciality', 'Updating speciality'); ?></h3>
    <h2><?php echo "\"$model->title\""; ?></h2>



<?php $this->renderPartial('_form', array('model' => $model)); ?>