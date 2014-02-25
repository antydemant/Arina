<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-mark-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('base', 'Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'actual_class_id'); ?>
		<?php echo $form->textField($model,'actual_class_id'); ?>
		<?php echo $form->error($model,'actual_class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mark'); ?>
		<?php echo $form->textField($model,'mark'); ?>
		<?php echo $form->error($model,'mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', array(
				'simple' => 'Звичайна',
				'attestation' => 'Атестація',
				'attestation_second_try' => 'Перездача атестації',
				'test' => 'Залік',
				'exam' => 'Екзамен',
				'exam_second_try' => 'Перездача екзамена',
				'course_work' => 'Курсова робота',
				'course_project' => 'Курсовий проект')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('base', 'Create') : Yii::t('base', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->