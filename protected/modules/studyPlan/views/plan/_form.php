<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this PlanController
 * @var $form TbActiveForm
 * @var \Plan $model
 */
?>

<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'studyPlan-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableClientValidation' => true,
    )
);
?>

<?php echo $form->dropDownListRow($model, 'speciality_id', CHtml::listData(Speciality::model()->findAll(), 'id', 'title')); ?>

<?php echo $form->textFieldRow($model, 'study_year'); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>