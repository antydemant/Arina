<?php
/**
 * @var WorkController $this
 * @var WorkPlan $model
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
<?php if ($model->isNewRecord): ?>
    <div class="control-group">
        <?php echo CHtml::label('Навчальний план для основи', 'plan_origin', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo TbHtml::dropDownList('plan_origin', '',
                CHtml::listData(StudyPlan::model()->findAll(), 'id', 'title'), array('empty' => '')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo CHtml::label('Робочий план для основи', 'work_origin', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo TbHtml::dropDownList('work_origin', '',
                CHtml::listData(WorkPlan::model()->findAll(), 'id', 'title'), array('empty' => '')); ?>
        </div>
    </div>
<?php endif; ?>
<?php $this->widget('studyPlan.widgets.Graph', array('model' => $model, 'field' => '', 'graph' => $model->graph)); ?>
<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>
<?php $this->endWidget(); ?>