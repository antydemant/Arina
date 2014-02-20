<?php
/**
 * @var $this SemesterController
 * @var $model Semester
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('plan/index'),
    $model->study_year => $this->createUrl('plan/view', array('id' => $model->id)),
    Yii::t('base', 'Semesters')
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>