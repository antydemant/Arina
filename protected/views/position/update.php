<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    Yii::t('base', 'Positions') => array('index'),
    $model->title => array('view', 'id' => $model->id),
    Yii::t('base', 'Updating'),
);

$this->menu = array(
    array('label' => Yii::t('position', 'Positions list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('position', 'Create new position'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),

    array('label' => Yii::t('position', 'View position'), 'url' => array('view', 'id' => $model->id)),
    /*array(
        'label' => Yii::t('group', 'Delete group'),
        'icon' => 'trash',
        'htmlOptions' => array(
            'submit' => array(
                'delete',
                'id' => $model->id,
            ),
            'confirm' => Yii::t('base', 'Do you want to delete this item?'),
        ),
    ),*/
);
?>

    <h3><?php echo Yii::t('position', 'Updating position'); ?></h3>
    <h2><?php echo "\"$model->title\""; ?></h2>



<?php $this->renderPartial('_form', array('model' => $model)); ?>