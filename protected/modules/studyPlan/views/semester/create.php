<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this SemesterController
 * @var $model Semester
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('main/index'),
    $model->plan->study_year => $this->createUrl('plan/view', array('id' => $model->study_plan_id)),
    Yii::t('base','Semesters')=>$this->createUrl('index',array('id'=>$model->study_plan_id)),
    Yii::t('studyPlan', 'New semester')
);
?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>