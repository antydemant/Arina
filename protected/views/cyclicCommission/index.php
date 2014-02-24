<?php
$this->breadcrumbs = array(
   Yii::t('base', 'Cyclic commissions'),
);

$this->menu = array(
    array('label' => Yii::t('teacher', 'List of cyclic commission'), 'url' => array('index')),
    array('label' => Yii::t('teacher', 'Create new cyclic commission'), 'url' => array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cyclic-commission-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        'title',
        'head_id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
