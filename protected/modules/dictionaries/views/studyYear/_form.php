<?php
/** @var $this StudyYearController ...*/

$form = $this->beginWidget(BoosterHelper::FORM, array(
	'id'=>'study-year-form',
	'enableAjaxValidation'=>true,
    ));
?>


	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'begin', array('class' => 'span5')); ?>

	<?php echo $form->textFieldRow($model, 'end', array('class' => 'span5')); ?>


    <?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

    <?php $this->endWidget(); ?>
