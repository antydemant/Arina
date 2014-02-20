<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'date'); ?>
        <?php echo $form->textField($model, 'date'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'class_number'); ?>
        <?php echo $form->textField($model, 'class_number'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'teacher_load_id'); ?>
        <?php echo $form->textField($model, 'teacher_load_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'class_type'); ?>
        <?php echo $form->textField($model, 'class_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'group_id'); ?>
        <?php echo $form->textField($model, 'group_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->