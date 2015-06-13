<?php
/* @var $this SpecialityController */
/* @var $model Speciality */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(BoosterHelper::FORM, array(
        'id' => 'speciality-form',
        'enableClientValidation' => true,
    )); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="span6">

            <?php echo $form->textFieldRow($model, 'title', array('size' => 200, 'maxlength' => 200, 'class' => 'span6')); ?>
            <?php echo $form->dropDownListRow($model, 'department_id', Department::getListAll('id', 'title'), array('class' => 'span6')); ?>
            <div class="row">
                <div class="span3">

                    <?php echo $form->datepickerRow($model, 'accreditation_date', array(
                        'options' => array(
                            'format' => 'dd.mm.yyyy',
                            'language' => 'uk',
                            'weekStart' => '1',
                        ),)); ?>
                </div>
                <div class="span3">
                    <?php echo $form->textFieldRow($model, 'number', array('size' => 15, 'maxlength' => 15)); ?>
                </div>
            </div>
            <?php echo $form->textFieldRow($model, 'qualification', array('size' => 200, 'maxlength' => 200, 'class' => 'span6')); ?>


        </div>
        <div class="span6">

            <?php echo $form->textFieldRow($model, 'apprenticeship', array('size' => 200, 'maxlength' => 200, 'class' => 'span6')); ?>
            <?php echo $form->textFieldRow($model, 'discipline', array('size' => 200, 'maxlength' => 200, 'class' => 'span6')); ?>
            <?php echo $form->textFieldRow($model, 'direction', array('size' => 200, 'maxlength' => 200, 'class' => 'span6')); ?>
            <?php echo $form->textFieldRow($model, 'education_form', array('size' => 200, 'maxlength' => 200, 'class' => 'span6')); ?>

        </div></div>
    <?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->