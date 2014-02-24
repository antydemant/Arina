<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Cyclic commissions') => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List CyclicCommission', 'url' => array('index')),
    array('label' => 'Manage CyclicCommission', 'url' => array('admin')),
);
?>

    <h1>Create CyclicCommission</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>