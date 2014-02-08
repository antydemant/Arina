<?php
/**
 *
 * @var GroupController $this
 * @var \Group $model
 * @var TbActiveForm $form
 */
?>
<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'group-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableAjaxValidation' => true,
    )
);
?>
<?php echo $form->textFieldRow($model, 'title'); ?>

<?php echo $form->dropDownListRow($model, 'speciality_id', array()); ?>
<?php echo $form->dropDownListRow($model, 'curator_id', array()); ?>
<?php echo $form->dropDownListRow($model, 'monitor_id', array()); ?>
    <div class="form-actions">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Отправить')
        ); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Сбросить')); ?>
    </div>

<?php $this->endWidget(); ?>