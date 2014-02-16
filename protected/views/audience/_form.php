<?php
/**
 * @var $this AudienceController
 * @var $model Audience
 * @var $form TbActiveForm
 */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'audience-form',
    'enableAjaxValidation' => true,
));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'number', array('class' => 'span5', 'maxlength' => 5)); ?>

<?php echo $form->dropDownListRow($model, 'type', Audience::getTypeList(), array('empty' => Yii::t('audience', 'Select audience type'), 'class' => 'span5')); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model,)); ?>

<?php $this->endWidget(); ?>
