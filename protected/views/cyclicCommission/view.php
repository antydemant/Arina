<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Cyclic commissions') => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List CyclicCommission', 'url' => array('index')),
    array('label' => 'Create CyclicCommission', 'url' => array('create')),
    array('label' => 'Update CyclicCommission', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete CyclicCommission', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage CyclicCommission', 'url' => array('admin')),
);
?>

<h1> <?php echo Yii::t('subject', 'View cycle') . " $model->id"; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'head_id',
    ),
)); ?>
