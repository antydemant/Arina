<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this HoursController
 * @var $model Hours
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('main/index'),
    $model->spSubject->plan->study_year => $this->createUrl('plan/view', array('id' => $model->spSubject->study_plan_id)),
    $model->spSubject->subject->title => $this->createUrl('spSubject/view', array('id' => $model->study_plan_subject_id)),
    '# ' . $model->semester->semester_number
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>