<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form TbActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget(Booster::FORM, array(
    'id' => 'student-form',

    'enableAjaxValidation' => false,
)); ?>

<p class="note"><?php echo Yii::t('base', 'Fields with <span class="required">*</span> are required.'); ?></p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo $form->labelEx($model, 'code'); ?>
    <?php echo $form->textField($model, 'code', array('size' => 12, 'maxlength' => 12)); ?>
    <?php echo $form->error($model, 'code'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'exemptions'); ?>
    <?php echo $form->checkBoxGroupsList($model,'exemptions',CHtml::listData(Exemption::model()->findAll(), 'id', 'title'))?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'last_name'); ?>
    <?php echo $form->textField($model, 'last_name', array('size' => 40, 'maxlength' => 40)); ?>
    <?php echo $form->error($model, 'last_name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'first_name'); ?>
    <?php echo $form->textField($model, 'first_name', array('size' => 40, 'maxlength' => 40)); ?>
    <?php echo $form->error($model, 'first_name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'middle_name'); ?>
    <?php echo $form->textField($model, 'middle_name', array('size' => 40, 'maxlength' => 40)); ?>
    <?php echo $form->error($model, 'middle_name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'group_id'); ?>
    <?php echo $form->textField($model, 'group_id'); ?>
    <?php echo $form->error($model, 'group_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'phone_number'); ?>
    <?php echo $form->textField($model, 'phone_number', array('size' => 15, 'maxlength' => 15)); ?>
    <?php echo $form->error($model, 'phone_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'mobile_number'); ?>
    <?php echo $form->textField($model, 'mobile_number', array('size' => 15, 'maxlength' => 15)); ?>
    <?php echo $form->error($model, 'mobile_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'mother_name'); ?>
    <?php echo $form->textField($model, 'mother_name', array('size' => 60, 'maxlength' => 60)); ?>
    <?php echo $form->error($model, 'mother_name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'father_name'); ?>
    <?php echo $form->textField($model, 'father_name', array('size' => 60, 'maxlength' => 60)); ?>
    <?php echo $form->error($model, 'father_name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'gender'); ?>
    <?php echo $form->textField($model, 'gender', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->error($model, 'gender'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'official_address'); ?>
    <?php echo $form->textField($model, 'official_address', array('size' => 60, 'maxlength' => 200)); ?>
    <?php echo $form->error($model, 'official_address'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'characteristics'); ?>
    <?php echo $form->textArea($model, 'characteristics', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'characteristics'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'factual_address'); ?>
    <?php echo $form->textField($model, 'factual_address', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'factual_address'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'birth_date'); ?>
    <?php echo $form->textField($model, 'birth_date'); ?>
    <?php echo $form->error($model, 'birth_date'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'admission_date'); ?>
    <?php echo $form->textField($model, 'admission_date'); ?>
    <?php echo $form->error($model, 'admission_date'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'tuition_payment'); ?>
    <?php echo $form->textField($model, 'tuition_payment', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'tuition_payment'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'admission_order_number'); ?>
    <?php echo $form->textField($model, 'admission_order_number'); ?>
    <?php echo $form->error($model, 'admission_order_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'admission_semester'); ?>
    <?php echo $form->textField($model, 'admission_semester'); ?>
    <?php echo $form->error($model, 'admission_semester'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'entry_exams'); ?>
    <?php echo $form->textField($model, 'entry_exams', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'entry_exams'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'education_document'); ?>
    <?php echo $form->textField($model, 'education_document', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'education_document'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'contract'); ?>
    <?php echo $form->textField($model, 'contract', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'contract'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'math_mark'); ?>
    <?php echo $form->textField($model, 'math_mark'); ?>
    <?php echo $form->error($model, 'math_mark'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'ua_language_mark'); ?>
    <?php echo $form->textField($model, 'ua_language_mark'); ?>
    <?php echo $form->error($model, 'ua_language_mark'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'mother_workplace'); ?>
    <?php echo $form->textField($model, 'mother_workplace', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'mother_workplace'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'mother_position'); ?>
    <?php echo $form->textField($model, 'mother_position', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'mother_position'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'mother_workphone'); ?>
    <?php echo $form->textField($model, 'mother_workphone', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'mother_workphone'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'mother_boss_workphone'); ?>
    <?php echo $form->textField($model, 'mother_boss_workphone', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'mother_boss_workphone'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'father_workplace'); ?>
    <?php echo $form->textField($model, 'father_workplace', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'father_workplace'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'father_position'); ?>
    <?php echo $form->textField($model, 'father_position', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'father_position'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'father_workphone'); ?>
    <?php echo $form->textField($model, 'father_workphone', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'father_workphone'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'father_boss_workphone'); ?>
    <?php echo $form->textField($model, 'father_boss_workphone', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'father_boss_workphone'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'graduated'); ?>
    <?php echo $form->textField($model, 'graduated'); ?>
    <?php echo $form->error($model, 'graduated'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'graduation_date'); ?>
    <?php echo $form->textField($model, 'graduation_date'); ?>
    <?php echo $form->error($model, 'graduation_date'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'graduation_basis'); ?>
    <?php echo $form->textField($model, 'graduation_basis', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'graduation_basis'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'graduation_semester'); ?>
    <?php echo $form->textField($model, 'graduation_semester'); ?>
    <?php echo $form->error($model, 'graduation_semester'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'graduation_order_number'); ?>
    <?php echo $form->textField($model, 'graduation_order_number'); ?>
    <?php echo $form->error($model, 'graduation_order_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'diploma'); ?>
    <?php echo $form->textField($model, 'diploma', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'diploma'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'direction'); ?>
    <?php echo $form->textField($model, 'direction', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'direction'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'misc_data'); ?>
    <?php echo $form->textField($model, 'misc_data', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'misc_data'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'hobby'); ?>
    <?php echo $form->textField($model, 'hobby', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'hobby'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->