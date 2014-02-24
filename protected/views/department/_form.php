<?php
/* @var $form TbActiveForm */
/* @var $this DepartmentController */
/* @var $model Department */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'department-form',
    'enableAjaxValidation' => false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span4', 'maxlength' => 40)); ?>

<?php echo $form->dropDownListRow($model, 'head_id', Teacher::getTreeList(), array('class' => 'span4')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>
