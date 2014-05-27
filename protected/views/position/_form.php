<?php
/* @var $this PositionController */
/* @var $model Position */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(BoosterHelper::FORM, array(
        'id' => 'position-form',
        'enableClientValidation' => true,
    )); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="span6">

            <?php echo $form->textFieldRow($model, 'title', array('size' => 200, 'maxlength' => 200, 'class' => 'span6')); ?>
            <?php echo $form->numberFieldRow($model, 'max_load_hour_1', array('class' => 'span6')); ?>
            <?php echo $form->numberFieldRow($model, 'max_load_hour_2', array('class' => 'span6')); ?>

        </div>
    </div>
    <?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->