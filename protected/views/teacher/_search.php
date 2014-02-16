<?php
/**
 * @var TbActiveForm $form
 * @var Teacher $model
 * @var TeacherController $this
 */
$form = $this->beginWidget(Booster::FORM, array(
    'method' => 'get',
    'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well'),
)); ?>

<?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'middle_name', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php //echo $form->textFieldRow($model, 'cyclic_commission_id', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => Yii::t('base', 'Find'))
    );
    ?>
    <input type="submit"/>
</div>

<?php $this->endWidget(); ?>
