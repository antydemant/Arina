<?php
/**
 * @var PlanController $this
 * @var StudyPlan $model
 * @var TbActiveForm $form
 */
?>

<?php $form = $this->beginWidget(Booster::FORM, array(
    'type' => 'horizontal',
    'htmlOptions' => array(
        'class' => 'well',
    ),
)); ?>

<?php echo $form->dropDownListRow($model, 'speciality_id', Speciality::getList(), array('empty' => 'Оберіть спеціальність')); ?>
<?php echo $form->dropDownListRow($model, 'year_id', StudyYear::getList(), array('empty' => 'Оберіть навчальний рік')); ?>
<?php $this->endWidget(); ?>