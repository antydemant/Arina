<?php
/**
 * @var PlanController $this
 * @var StudyPlan $model
 */

?>

    <h3>Редагування</h3>
<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php $this->widget('studyPlan.widgets.SubjectTable', array(
    'subjectDataProvider' => $model->getPlanSubjectProvider()
));