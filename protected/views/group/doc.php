<?php
/**
 *
 * @var GroupController $this
 * @var \GroupDocForm $model
 * @var CActiveForm $form
 */
?>
<?php $form = $this->beginWidget('CActiveForm', array()); ?>
<?php echo $form->textField($model, 'teacher1'); ?>
<?php echo $form->textField($model, 'teacher2'); ?>
<?php $this->endWidget(); ?>