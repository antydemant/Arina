<?php
/**
 * @var PlanController $this
 * @var Plan $model
 */
$this->breadcrumbs = array(
    'Навчальні плани'=>$this->createUrl('index'),
    $model->study_year
);
?>
<?php $this->renderPartial('_form', array('model' => $model)); ?>