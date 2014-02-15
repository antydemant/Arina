<?php
/**
 * @var $this SemesterController
 * @var $model Semester
 */
?>
<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'semester-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableAjaxValidation' => true,
    )
);
?>

<?php echo $form->dropDownListRow($model, 'study_plan_id', CHtml::listData(Plan::model()->findAll(), 'id', 'study_year')); ?>

<?php echo $form->textFieldRow($model, 'semester_number'); ?>
<?php echo $form->textFieldRow($model, 'weeks_count'); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>
