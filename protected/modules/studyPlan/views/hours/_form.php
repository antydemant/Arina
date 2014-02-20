<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this HoursController
 * @var $model Hours
 */
?>
<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'hours-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableClientValidation' => true,
    )
);
?>

<?php echo $form->dropDownListRow($model, 'study_plan_subject_id', CHtml::listData(SpSubject::model()->findAll(), 'id', 'subject.title')); ?>

<?php echo $form->dropDownListRow($model, 'study_plan_info_id', CHtml::listData(Semester::model()->findAll(), 'id', 'semester_number')); ?>

<?php echo $form->textFieldRow($model, 'lectures'); ?>

<?php echo $form->textFieldRow($model, 'labs'); ?>

<?php echo $form->textFieldRow($model, 'practs'); ?>

<?php echo $form->textFieldRow($model, 'selfwork'); ?>

<?php echo $form->textFieldRow($model, 'hours_per_week'); ?>

<?php echo $form->checkBoxRow($model, 'test'); ?>

<?php echo $form->checkBoxRow($model, 'exam'); ?>

<?php echo $form->checkBoxRow($model, 'course_work'); ?>

<?php echo $form->checkBoxRow($model, 'course_project'); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>
