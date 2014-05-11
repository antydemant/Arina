<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(BoosterHelper::FORM, array(
        'id' => 'class-mark-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note"><?php echo Yii::t('base', 'Fields with <span class="required">*</span> are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'actual_class_id', array('style' => 'display: none', 'labelOptions' => array('label' => false))); ?>

    <?php echo $form->textFieldRow($model, 'mark'); ?>

    <?php echo $form->textFieldRow($model, 'student_id', array('style' => 'display: none', 'labelOptions' => array('label' => false))); ?>

    <?php echo $form->dropDownListRow($model, 'type', array(
        'simple' => 'Звичайна',
        'attestation' => 'Атестація',
        'attestation_second_try' => 'Перездача атестації',
        'test' => 'Залік',
        'exam' => 'Екзамен',
        'exam_second_try' => 'Перездача екзамена',
        'course_work' => 'Курсова робота',
        'course_project' => 'Курсовий проект')); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('base', 'Create') : Yii::t('base', 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->