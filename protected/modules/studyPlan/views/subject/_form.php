<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 15.02.14
 * Time: 10:11
 * @var $this SubjectController
 * @var $model Subject
 */
?>
<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'subject-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableAjaxValidation' => true,
    )
);
?>

<?php echo $form->dropDownListRow($model, 'study_plan_id', CHtml::listData(Plan::model()->findAll(), 'id', 'study_year')); ?>
<?php echo $form->error($model, 'study_plan_id'); ?>
<?php echo $form->dropDownListRow($model, 'subject_id', CHtml::listData(Subject::model()->findAll(), 'id', 'title')); ?>
<?php echo $form->error($model, 'subject_id'); ?>
<?php echo $form->textFieldRow($model, 'total_hours'); ?>
<?php echo $form->error($model, 'total_hours'); ?>
<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>