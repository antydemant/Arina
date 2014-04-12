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
<span>Графік тут</span>

    <div class="form-actions">
        <?php echo CHtml::submitButton(Yii::t('base', 'Create'), array('class' => 'primary')); ?>
    </div>
<?php $this->endWidget(); ?>