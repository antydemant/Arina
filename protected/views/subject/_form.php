<?php
/**
 * @var $this SubjectController
 * @var $form TbActiveForm
 * @var $model Subject
 * @var $subModel SubjectRelation
 */
$subModel = new SubjectRelation();
$subModel->subject_id = $model->id;
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'subject-form',
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'class' => 'span5',
    ),
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldRow($model, 'code', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldRow($model, 'short_name', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->toggleButtonRow($model, 'practice', array('enabledLabel'=>Yii::t('base','Yes'),'disabledLabel'=>Yii::t('base','No'),)); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'class' => 'span6',
        'style' => 'float:left',
    ),
)); ?>
<?php $this->renderPartial('_subjectRelation', array('id' => $model->id)); ?>
<?php echo $form->hiddenField($subModel, 'subject_id'); ?>
<?php echo $form->dropDownListRow($subModel, 'cycle_id', SubjectCycle::getList(), array('class' => 'span6')); ?>
<?php echo $form->dropDownListRow($subModel, 'speciality_id', Speciality::getList(), array('class' => 'span6')); ?>
<div>
    <?php echo CHtml::ajaxSubmitButton(Yii::t('base', 'Add'),
        array('/subject/addRelation', 'id' => $model->id), array('replace' => '#subject-relations'), array('class' => 'btn btn-success')); ?>
</div>
<?php $this->endWidget(); ?>
