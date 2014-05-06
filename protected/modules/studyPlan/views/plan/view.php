<?php
/**
 * @var PlanController $this
 * @var StudyPlan $model
 */
?>
<div class="row well">
    <h3><?php echo $model->speciality->title; ?></h3>

    <p>Дата створення: <?php echo $model->created; ?></p>

    <?php echo CHtml::link('Експортувати', $this->createUrl('makeExcel', array('id' => $model->id)), array('class' => 'btn btn-primary')); ?>
    <br/>
    <br/>
<?php $this->widget('studyPlan.widgets.SubjectTable', array(
    'subjectDataProvider' => $model->getPlanSubjectProvider()
));