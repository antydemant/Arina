<!--/* @var $model Settings */-->

<?php
$form = $this->beginWidget(BoosterHelper::FORM, array(
    'id' => 'settings-form',
    'enableClientValidation' => true,
));
?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'key', array('class' => 'span3', 'disabled' => ($model->scenario ==  'update' ? true : false))); ?>

    <?php echo $form->textFieldRow($model, 'title', array('class' => 'span3')); ?>

    <?php echo $form->textFieldRow($model, 'value', array('class' => 'span3')); ?>

    <?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>