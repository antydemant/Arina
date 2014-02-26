<?php
/**
 * @var $this SubjectController
 * @var $form TbActiveForm
 * @var $model Subject
 */
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'subject-form',
    'enableClientValidation' => true,
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->dropDownListRow($model, 'cycle_id', SubjectCycle::getList(), array('class' => 'span5')); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>
