<?php
/**
 *
 * @var GroupController $this
 * @var \GroupDocForm $model
 * @var TbActiveForm $form
 */
?>
<?php $form = $this->beginWidget(Booster::FORM,     
	array(
        'id' => 'group-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableAjaxValidation' => true,
    )); ?>
<?php echo $form->textFieldRow($model, 'teacher1'); ?>
<?php echo $form->textFieldRow($model, 'teacher2'); ?>

<div class="form-actions">
    <?php $this->widget(
        Booster::BUTTON,
        array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => Yii::t('base', 'Create file'),
        )
    ); ?>
</div>
<?php $this->endWidget(); ?>