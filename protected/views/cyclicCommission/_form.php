<?php
/* @var $form TbActiveForm */
/* @var $this CyclicCommissionController */
/* @var $model CyclicCommission */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cyclic-commission-form',
    'enableAjaxValidation' => false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span3')); ?>

<?php echo $form->dropDownListRow($model, 'head_id', Teacher::getList(), array('class' => 'span3', 'empty'=>'')); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>
