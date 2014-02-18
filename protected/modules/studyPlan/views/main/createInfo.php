<?php
/**
 * @var TbActiveForm $form
 * @var MainController $this
 * @var \Plan $model
 */
?>
<div id="first">
<?php $form = $this->beginWidget(Booster::FORM, array(
        'id' => 'plan-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableAjaxValidation' => true,
    )
); ?>

<?php echo $form->dropDownListRow($model, 'speciality_id', Speciality::getList()); ?>

<?php echo $form->textFieldRow($model, 'study_year'); ?>
    <div class="form-actions">
        <?php echo CHtml::ajaxSubmitButton(
            $model->isNewRecord ? 'Create' : 'Save',
            $this->createUrl('createInfo'),
            array('update'=>'#first')); ?>
        <?php /*$this->widget(Booster::BUTTON, array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => $model->isNewRecord ? 'Create' : 'Save',)
        );*/ ?>
    </div>
<?php $this->endWidget(); ?>
</div>

