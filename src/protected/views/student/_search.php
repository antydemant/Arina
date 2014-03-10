<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile_number'); ?>
		<?php echo $form->textField($model,'mobile_number',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mother_name'); ?>
		<?php echo $form->textField($model,'mother_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'father_name'); ?>
		<?php echo $form->textField($model,'father_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'official_address'); ?>
		<?php echo $form->textField($model,'official_address',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'characteristics'); ?>
		<?php echo $form->textArea($model,'characteristics',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'factual_address'); ?>
		<?php echo $form->textField($model,'factual_address',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_date'); ?>
		<?php echo $form->textField($model,'birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admission_date'); ?>
		<?php echo $form->textField($model,'admission_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tuition_payment'); ?>
		<?php echo $form->textField($model,'tuition_payment',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admission_order_number'); ?>
		<?php echo $form->textField($model,'admission_order_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admission_semester'); ?>
		<?php echo $form->textField($model,'admission_semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_exams'); ?>
		<?php echo $form->textField($model,'entry_exams',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_document'); ?>
		<?php echo $form->textField($model,'education_document',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract'); ?>
		<?php echo $form->textField($model,'contract',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'math_mark'); ?>
		<?php echo $form->textField($model,'math_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ua_language_mark'); ?>
		<?php echo $form->textField($model,'ua_language_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mother_workplace'); ?>
		<?php echo $form->textField($model,'mother_workplace',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mother_position'); ?>
		<?php echo $form->textField($model,'mother_position',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mother_workphone'); ?>
		<?php echo $form->textField($model,'mother_workphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mother_boss_workphone'); ?>
		<?php echo $form->textField($model,'mother_boss_workphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'father_workplace'); ?>
		<?php echo $form->textField($model,'father_workplace',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'father_position'); ?>
		<?php echo $form->textField($model,'father_position',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'father_workphone'); ?>
		<?php echo $form->textField($model,'father_workphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'father_boss_workphone'); ?>
		<?php echo $form->textField($model,'father_boss_workphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'graduated'); ?>
		<?php echo $form->textField($model,'graduated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'graduation_date'); ?>
		<?php echo $form->textField($model,'graduation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'graduation_basis'); ?>
		<?php echo $form->textField($model,'graduation_basis',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'graduation_semester'); ?>
		<?php echo $form->textField($model,'graduation_semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'graduation_order_number'); ?>
		<?php echo $form->textField($model,'graduation_order_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diploma'); ?>
		<?php echo $form->textField($model,'diploma',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direction'); ?>
		<?php echo $form->textField($model,'direction',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'misc_data'); ?>
		<?php echo $form->textField($model,'misc_data',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hobby'); ?>
		<?php echo $form->textField($model,'hobby',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->