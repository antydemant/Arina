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
        'enableAjaxValidation' => false,
    )); ?>
    <div class="control-group"><label class="control-label" for="GroupDocForm_teacher">Група</label>
        <div class="controls" style="margin-top: 5px;">

            <span><?php echo $model->group->title; ?></span> </div></div>
<?php echo $form->dropDownListRow($model, 'teacher',CHtml::listData(Teacher::model()->findAll(array('order'=>'last_name, middle_name, first_name')),'fullName','fullName'),array('class'=>'span4')); ?>
<?php echo $form->datePickerRow($model, 'date',array('options'=>array('format' => 'mm.dd.yyyy'),)); ?>
<?php echo $form->dropDownListRow($model, 'subject', Subject::getListForSpeciality($model->group->speciality_id)); ?>
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