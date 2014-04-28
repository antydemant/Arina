<?php
/**
 * @var $this CyclicCommissionController
 * @var $dataProvider CActiveDataProvider
 * @var $for TbActiveForm
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Cyclic commissions'),
);

$this->menu = array(
    array('label' => Yii::t('teacher', 'Create new cyclic commission'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
);
?>

<?php
$columns = array(
    'title',
    array(
        'type' => 'raw',
        'name' => 'headName',
        'value' => 'CHtml::link($data->getHeadName(), array("teacher/view","id"=>$data->head_id))',
    ),
    array(
        'header' => Yii::t('base', 'Actions'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
    ),
);
$this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns,))
?>
