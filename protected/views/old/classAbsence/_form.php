<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget(Booster::FORM, array(
	'id'=>'class-absence-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'actual_class_id', array('style' => 'display: none', 'labelOptions' => array('label' => false))); ?>

		<?php echo $form->textFieldRow($model,'student_id', array('style' => 'display: none', 'labelOptions' => array('label' => false))); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('base', 'Create') : Yii::t('base', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->