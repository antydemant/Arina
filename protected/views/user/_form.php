<?php
/** @var User $model  */
/** @var UserController $this  */
/** @var TbActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
)); ?>

<p class="help-block">Поля, відмічені <span class="required">*</span>, обов'язкові для заповнення.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php
if (Yii::app()->user->checkAccess('admin')) {
    //echo $form->textFieldRow($model, 'role', array('class' => 'span5'));
    echo $form->textFieldRow($model, 'identity_id', array('class' => 'span5'));
    echo $form->textFieldRow($model, 'identity_type', array('class' => 'span5'));
}
?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>
