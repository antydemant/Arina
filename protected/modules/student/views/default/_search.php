<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget(Booster::FORM, array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span8'),

    )); ?>

    <?php echo $form->textFieldRow($model, 'id'); ?>

    <?php echo $form->textFieldRow($model, 'code', array('size' => 12, 'maxlength' => 12)); ?>

    <?php echo $form->textFieldRow($model, 'last_name', array('size' => 40, 'maxlength' => 40)); ?>

    <?php echo $form->textFieldRow($model, 'first_name', array('size' => 40, 'maxlength' => 40)); ?>

    <?php echo $form->textFieldRow($model, 'middle_name', array('size' => 40, 'maxlength' => 40)); ?>

    <?php echo $form->textFieldRow($model, 'group_id'); ?>

    
    <?php echo $form->textFieldRow($model, 'phone_number', array('size' => 15, 'maxlength' => 15)); ?>

    <?php echo $form->textFieldRow($model, 'mobile_number', array('size' => 15, 'maxlength' => 15)); ?>

    <?php echo $form->textFieldRow($model, 'mother_name', array('size' => 60, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldRow($model, 'father_name', array('size' => 60, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldRow($model, 'gender', array('size' => 10, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldRow($model, 'official_address', array('size' => 60, 'maxlength' => 200)); ?>

    <?php echo $form->textAreaRow($model, 'characteristics', array('rows' => 6, 'cols' => 50)); ?>
    
		<?php echo $form->textFieldRow($model,'factual_address',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'birth_date'); ?>

		<?php echo $form->textFieldRow($model,'admission_date'); ?>

		<?php echo $form->textFieldRow($model,'tuition_payment',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'admission_order_number'); ?>

		<?php echo $form->textFieldRow($model,'admission_semester'); ?>
	
		<?php echo $form->textFieldRow($model,'entry_exams',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'education_document',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'contract',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'math_mark'); ?>

		<?php echo $form->textFieldRow($model,'ua_language_mark'); ?>

		<?php echo $form->textFieldRow($model,'mother_workplace',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'mother_position',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'mother_workphone',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'mother_boss_workphone',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'father_workplace',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'father_position',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'father_workphone',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'father_boss_workphone',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'graduated'); ?>

		<?php echo $form->textFieldRow($model,'graduation_date'); ?>

		<?php echo $form->textFieldRow($model,'graduation_basis',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'graduation_semester'); ?>

		<?php echo $form->textFieldRow($model,'graduation_order_number'); ?>

		<?php echo $form->textFieldRow($model,'diploma',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'direction',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'misc_data',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'hobby',array('size'=>60,'maxlength'=>100)); ?>

    
    
    <div class="form-actions">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => Yii::t('base', 'Find')
            )
        ); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->