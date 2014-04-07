<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this SpSubjectController
 * @var $model SpSubject
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('plan/index'),
    $model->plan->study_year => $this->createUrl('plan/view', array('id' => $model->sp_plan_id)),
    $model->subject->title
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>