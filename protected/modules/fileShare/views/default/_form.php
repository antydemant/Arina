<?php
/* @var $this FileShareController */
/* @var $model FileShare */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget(BoosterHelper::FORM, array(
    'id' => 'file-share-form',
    'htmlOptions' => array('enctype'=>'multipart/form-data'),
    'enableClientValidation' => true,
)); ?>

	<?php echo $form->errorSummary($model); ?>
    <p></p>

    <p><?php echo $form->fileField($model, 'upload_file'); ?></p>

    <p><?php echo $form->toggleButtonRow($model, 'file_lock'); ?></p>

    <?php $this->renderPartial('//formButtons', array('model' => $model,)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->