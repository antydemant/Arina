<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget(Booster::FORM, array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span8'),

    )); ?>

    <?php echo $form->textFieldRow($model, 'id'); ?>

    <?php echo $form->textFieldRow($model, 'code', array('size' => 12, 'maxlength' => 12)); ?>

    <?php echo $form->textFieldRow($model, 'last_name', array('size' => 40, 'maxlength' => 40)); ?>

    <?php echo $form->textFieldRow($model, 'first_name', array('size' => 40, 'maxlength' => 40)); ?>

    <?php echo $form->textFieldRow($model, 'middle_name', array('size' => 40, 'maxlength' => 40)); ?>

    <?php echo $form->textFieldRow($model, 'group_id'); ?>

    <!--
    <?php echo $form->textFieldRow($model, 'phone_number', array('size' => 15, 'maxlength' => 15)); ?>

    <?php echo $form->textFieldRow($model, 'mobile_number', array('size' => 15, 'maxlength' => 15)); ?>

    <?php echo $form->textFieldRow($model, 'mother_name', array('size' => 60, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldRow($model, 'father_name', array('size' => 60, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldRow($model, 'gender', array('size' => 10, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldRow($model, 'address', array('size' => 60, 'maxlength' => 200)); ?>

    <?php echo $form->textAreaRow($model, 'characteristics', array('rows' => 6, 'cols' => 50)); ?>
	-->

    <div class="form-actions">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => Yii::t('base', 'Find')
            )
        ); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->