<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Cyclic commissions') => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List CyclicCommission', 'url' => array('index')),
    array('label' => 'Create CyclicCommission', 'url' => array('create')),
    array('label' => 'View CyclicCommission', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage CyclicCommission', 'url' => array('admin')),
);
?>

    <h1>Update CyclicCommission <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>