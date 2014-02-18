<?php
/**
 * @var PlanController $this
 * @var Plan $model
 */
$this->breadcrumbs = array(
    'Навчальні плани' => $this->createUrl('index'),
    'Новий навчальний план'
);
?>
<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'studyPlan-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        //'enableAjaxValidation' => true,
        'enableClientValidation' => true,
    )
);
?>

<?php echo $form->dropDownListRow($model, 'speciality_id', Speciality::getList()); ?>

<?php echo $form->textFieldRow($model, 'study_year'); ?>

<div class="form-actions">

    <?php echo CHtml::ajaxSubmitButton('Далі', $this->createUrl('create'),
        array('update' => '#subject-form'), array('class' => 'btn btn-primary', 'id' => 'first-btn')); ?>

</div>

<?php $this->endWidget(); ?>

<div id="subject-form" class="well span10"></div>
