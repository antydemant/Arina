<?php
/* @var $this CycleController */
/* @var $model SubjectCycle */
/* @var $form TbActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget(Booster::FORM, array(
	'id'=>'subject-cycle-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255)); ?>

	<?php $this->renderPartial('//formButtons', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->