<?php
/**
 * @var PlanController $this
 * @var StudyPlan $model
 * @var TbActiveForm $form
 */
?>


<?php $form = $this->beginWidget(BoosterHelper::FORM, array(
    'type' => 'horizontal',
    'htmlOptions' => array(
        'class' => 'well',
    ),
)); ?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListRow($model, 'speciality_id', Speciality::getList(), array('empty' => 'Оберіть спеціальність')); ?>
<?php $this->widget('studyPlan.widgets.Graph', array('model' => $model, 'field' => '')); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>
<?php $this->endWidget(); ?>