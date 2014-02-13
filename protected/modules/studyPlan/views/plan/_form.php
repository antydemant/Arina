<?php
/**
 * @var $this StudyPlanController
 * @var $form TbActiveForm
 * @var \StudyPlan $model
 */
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

<?php echo $form->dropDownListRow($model, 'speciality_id', CHtml::listData(Speciality::model()->findAll(),'id','title')); ?>

<?php echo $form->textFieldRow($model, 'study_year'); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>