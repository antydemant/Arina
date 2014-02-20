<?php
/**
 * @var $this MainController
 * @var $model PlanSemesters
 * @var $form TbActiveForm
 */
?>
<div id="reloaded">
    <?php $form = $this->beginWidget(Booster::FORM, array(
        'id' => 'semester-form',
        'htmlOptions' => array('class' => 'well span11'),
        'enableClientValidation' => true,
    ));?>
    <div class="span3">
        <div><strong><?php echo 'Предмети у плані'; ?></strong></div>
        <?php echo $form->dropDownListRow($model,
            'subjectId',
            CHtml::listData(SpSubject::model()->findAll("study_plan_id=$model->planId"), 'subject_id', 'subject.title'),
            array('size' => 6)); ?>
    </div>
    <div class="span3">
        <?php
        echo $form->textFieldRow($model, 'lectures');
        echo $form->textFieldRow($model, 'labs');
        echo $form->textFieldRow($model, 'practs');
        echo $form->textFieldRow($model, 'selfwork');
        echo $form->textFieldRow($model, 'hours_per_week');
        echo $form->checkBoxRow($model, 'test');
        echo $form->checkBoxRow($model, 'exam');
        echo $form->checkBoxRow($model, 'course_work');
        echo $form->checkBoxRow($model, 'course_project');
        echo CHtml::link('Додати', $this->createUrl('addHours', array('id' => $model->planId)), array('class' => 'btn bind'));
        ?>
    </div>
    <div class="span4">
        <?php echo $form->dropDownListRow($model,
            'semesterId',
            $model->getSemesters(),
            array('size' => 6)); ?>
        <?php echo CHtml::link('+', $this->createUrl('addSemester', array('id' => $model->planId)), array('class' => 'btn bind')); ?>
        <?php echo CHtml::link('-', $this->createUrl('removeSemester', array('id' => $model->planId)), array('class' => 'btn bind')); ?>
        <?php echo $form->numberFieldRow($model, 'semester_number'); ?>
        <?php echo $form->numberFieldRow($model, 'weeks_count'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>

<script>
    $(makeHandler());
</script>