<?php
/**
 * @var $this CyclicCommissionController
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Cyclic commissions') => array('index'),
    $model->title => array('view', 'id' => $model->id),
    Yii::t('base', 'Updating'),
);

$this->menu = array(
    array('label' => Yii::t('teacher', 'Commissions list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('teacher', 'Create new cyclic commission'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array(
        'label' => Yii::t('teacher', 'View cyclic commission'),
        'icon' => 'eye-open',
        'url' => array('view', 'id' => $model->id)
    ),
    array(
        'label' => Yii::t('group', 'Delete group'),
        'url' => $this->createUrl('delete', array('id' => $model->id)),
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

    <h2> <?php echo Yii::t('base', 'Updating'); ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>