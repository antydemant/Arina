<?php
/**
 * @var PlanController $this
 * @var Plan $model
 */
$this->breadcrumbs = array(
    'Навчальні плани'=>$this->createUrl('index'),
    'Новий навчальний план'
);
?>
<?php $this->renderPartial('_form', array('model' => $model)); ?>