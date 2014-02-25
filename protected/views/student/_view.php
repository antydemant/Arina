<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('middle_name')); ?>:</b>
	<?php echo CHtml::encode($data->middle_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile_number')); ?>:</b>
	<?php echo CHtml::encode($data->mobile_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_name')); ?>:</b>
	<?php echo CHtml::encode($data->mother_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_name')); ?>:</b>
	<?php echo CHtml::encode($data->father_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('official_address')); ?>:</b>
	<?php echo CHtml::encode($data->official_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('characteristics')); ?>:</b>
	<?php echo CHtml::encode($data->characteristics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factual_address')); ?>:</b>
	<?php echo CHtml::encode($data->factual_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_date')); ?>:</b>
	<?php echo CHtml::encode($data->birth_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admission_date')); ?>:</b>
	<?php echo CHtml::encode($data->admission_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tuition_payment')); ?>:</b>
	<?php echo CHtml::encode($data->tuition_payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admission_order_number')); ?>:</b>
	<?php echo CHtml::encode($data->admission_order_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admission_semester')); ?>:</b>
	<?php echo CHtml::encode($data->admission_semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_exams')); ?>:</b>
	<?php echo CHtml::encode($data->entry_exams); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_document')); ?>:</b>
	<?php echo CHtml::encode($data->education_document); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract')); ?>:</b>
	<?php echo CHtml::encode($data->contract); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('math_mark')); ?>:</b>
	<?php echo CHtml::encode($data->math_mark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ua_language_mark')); ?>:</b>
	<?php echo CHtml::encode($data->ua_language_mark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_workplace')); ?>:</b>
	<?php echo CHtml::encode($data->mother_workplace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_position')); ?>:</b>
	<?php echo CHtml::encode($data->mother_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_workphone')); ?>:</b>
	<?php echo CHtml::encode($data->mother_workphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_boss_workphone')); ?>:</b>
	<?php echo CHtml::encode($data->mother_boss_workphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_workplace')); ?>:</b>
	<?php echo CHtml::encode($data->father_workplace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_position')); ?>:</b>
	<?php echo CHtml::encode($data->father_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_workphone')); ?>:</b>
	<?php echo CHtml::encode($data->father_workphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_boss_workphone')); ?>:</b>
	<?php echo CHtml::encode($data->father_boss_workphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduated')); ?>:</b>
	<?php echo CHtml::encode($data->graduated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduation_date')); ?>:</b>
	<?php echo CHtml::encode($data->graduation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduation_basis')); ?>:</b>
	<?php echo CHtml::encode($data->graduation_basis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduation_semester')); ?>:</b>
	<?php echo CHtml::encode($data->graduation_semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduation_order_number')); ?>:</b>
	<?php echo CHtml::encode($data->graduation_order_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diploma')); ?>:</b>
	<?php echo CHtml::encode($data->diploma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direction')); ?>:</b>
	<?php echo CHtml::encode($data->direction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('misc_data')); ?>:</b>
	<?php echo CHtml::encode($data->misc_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hobby')); ?>:</b>
	<?php echo CHtml::encode($data->hobby); ?>
	<br />

	*/ ?>

</div>