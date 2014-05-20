<?php
/**
 * @var WorkController $this
 * @var WorkPlan $model
 * @var TbActiveForm $form
 */
?>


<?php $form = $this->beginWidget(
    BoosterHelper::FORM,
    array(
        'type' => 'horizontal',
        'htmlOptions' => array(
            'class' => 'well',
        ),
    )
); ?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListRow(
    $model,
    'speciality_id',
    Speciality::getList(),
    array('empty' => 'Оберіть спеціальність')
); ?>
<?php echo $form->dropDownListRow($model, 'year_id', StudyYear::getList(), array('empty' => '')); ?>
<?php if ($model->isNewRecord): ?>
    <?php echo $form->dropDownListRow(
        $model,
        'plan_origin',
        CHtml::listData(StudyPlan::model()->findAll(), 'id', 'title'),
        array('empty' => '')
    ); ?>
    <?php echo $form->dropDownListRow(
        $model,
        'work_origin',
        CHtml::listData(WorkPlan::model()->findAll(), 'id', 'title'),
        array('empty' => '')
    ); ?>
<?php endif; ?>
<?php $this->widget('studyPlan.widgets.Graph', array('model' => $model, 'field' => '', 'graph' => $model->graph)); ?>
<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>
<?php $this->endWidget(); ?>