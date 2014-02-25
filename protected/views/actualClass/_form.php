<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'actual-class-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php echo $form->textField($model, 'date'); ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'class_number'); ?>
        <?php echo $form->textField($model, 'class_number'); ?>
        <?php echo $form->error($model, 'class_number'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'teacher_load_id'); ?>
        <?php echo $form->textField($model, 'teacher_load_id'); ?>
        <?php echo $form->error($model, 'teacher_load_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'class_type'); ?>
        <?php echo $form->textField($model, 'class_type'); ?>
        <?php echo $form->error($model, 'class_type'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->