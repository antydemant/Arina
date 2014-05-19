<?php
/**
 * @var PlanController $this
 * @var StudyPlan $model
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('main/index'),
    'Новий робочий план'
);
?>
    <h2>Створення нового робочого плану</h2>
<?php $this->renderPartial('_form', array('model' => $model)); ?>