<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
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
        'enableClientValidation' => true,
    )
);
?>

<?php /*echo $form->dropDownListRow($model, 'sp_plan_id', CHtml::listData(Plan::model()->findAll(), 'id', 'study_year')); */?>

<?php echo $form->dropDownListRow($model, 'subject_id', CHtml::listData(Subject::model()->findAll(), 'id', 'title')); ?>

<?php echo $form->textFieldRow($model, 'total_hours'); ?>

<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>