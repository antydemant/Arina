<?php
/***
 * @var $model Department
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Departments') => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('department', 'Departments list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('department', 'Create new department'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('department', 'Update department'), 'url' => array('update', 'id' => $model->id), 'icon' => 'pencil'),
    array('label' => Yii::t('department', 'Delete department'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'icon' => 'trash'),
    array('label' => Yii::t('department', 'Manage department'), 'url' => array('admin', 'id' => $model->id)),
);
?>

<h3><?php echo Yii::t('department', 'View department'); ?> </h3>
<h2><?php echo '"' . $model->title . '"'; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        'title',
        array(
            'name' => 'head_id',
            'value' => $model->head->getFullName()
        ),
    ),
)); ?>
