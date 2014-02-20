<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var PlanController $this
 * @var Plan $model
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('index'),
    Yii::t('studyPlan', 'New study plan')
);
?>
<?php $this->renderPartial('_form', array('model' => $model)); ?>