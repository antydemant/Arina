<?php
/**
 *
 * @var GroupController $this
 * @var \Group $model
 * @var TbActiveForm $form
 */
?>
<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'group-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well span10'),
        'enableAjaxValidation' => true,
    )
);
?>
<?php echo $form->textFieldRow($model, 'title'); ?>

<?php echo $form->dropDownListRow($model, 'speciality_id', Speciality::getList(), array('empty' => Yii::t('group', 'Select speciality'))); ?>
<?php echo $form->dropDownListRow($model, 'curator_id', Teacher::getList(), array('empty' => Yii::t('group', 'Select curator'))); ?>
<?php
if (!$model->isNewRecord) {
    echo $form->dropDownListRow($model, 'monitor_id', $model->getStudentsList(), array('empty' => Yii::t('group', 'Select prefect')));
}
?>
<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>

<?php $this->endWidget(); ?>