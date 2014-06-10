<?php
/* @var $this CycleController */
/* @var $model SubjectCycle */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(BoosterHelper::FORM, array(
        'id' => 'subject-cycle-form',
        'enableClientValidation' => true,
    )); ?>

    <p class="note"><?php echo Yii::t('base', 'Fields with <span class="required">*</span> are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'id', array('size' => 100, 'maxlength' => 255,'class'=>'span6')); ?>

    <?php echo $form->textFieldRow($model, 'title', array('size' => 100, 'maxlength' => 255,'class'=>'span6')); ?>

    <?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->