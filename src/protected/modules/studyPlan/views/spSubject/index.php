<?php
/**
 * @var $this SubjectController
 * @var $dataProvider CActiveDataProvider
 */

$this->breadcrumbs = array(
    'Навчальні плани',
);

$this->menu = array(
    array(
        'type' => Booster::TYPE_PRIMARY,
        'label' => 'Додати предмет',
        'url' => $this->createUrl('create'),
    ),
);
?>
<?php
$columns = array(
    array('name' => 'plan.study_year', 'header' => 'Навчальний рік'),
    array('name' => 'subject.title', 'header' => 'Предмет'),
    array('name' => 'total_hours', 'header' => 'Усього годин'),
    array(
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
        'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
        'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"]))',
    ),
);
?>
<?php $this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns));