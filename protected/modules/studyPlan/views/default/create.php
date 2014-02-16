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
        'enableAjaxValidation' => true,
    )
);
?>

<?php echo $form->dropDownListRow($model, 'speciality_id', CHtml::listData(Speciality::model()->findAll(), 'id', 'title')); ?>

<?php echo $form->textFieldRow($model, 'study_year'); ?>

<div class="form-actions">

    <?php echo TbHtml::ajaxSubmitButton('Далі', $this->createUrl('ajaxPlan'),
        array('update' => '#subject-form'), array('class' => 'btn btn-primary','id'=>'first-btn')); ?>

</div>
<div id="subject-form"></div>

<?php $this->endWidget(); ?>

