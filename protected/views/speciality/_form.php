<?php
/* @var $this SpecialityController */
/* @var $model Speciality */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(Booster::FORM, array(
        'id' => 'speciality-form',
        'enableClientValidation' => true,
    )); ?>
<!--
    <p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'title', array('size' => 40, 'maxlength' => 40)); ?>
    <?php echo $form->dropDownListRow($model, 'department_id', Department::getListAll('id','title')); ?>
    <?php echo $form->textFieldRow($model, 'number', array('size' => 15, 'maxlength' => 15)); ?>
    <?php echo $form->datepickerRow($model, 'accreditation_date', array(
        'options' => array(
            'format' => 'yyyy-mm-dd',
            'keyboardNavigation' => true
        ),)); ?>
    <?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->