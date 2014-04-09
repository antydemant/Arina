<?php
/**
 * @var PlanController $this
 * @var StudyGraphic $model
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('main/index'),
    $model->plan->year->title => $this->createUrl('plan/view', array('id' => $model->plan_id)),
);
?>
    <h3>Графік навчального процесу</h3>

<?php $form = $this->beginWidget(Booster::FORM, array(
    'htmlOptions' => array(
        'class' => 'well',
    )
)); ?>

    <span>Таблиця</span>

    <div class="form-actions">
        <?php echo CHtml::submitButton(Yii::t('base', 'Next'), array('class' => 'btn btn-primary')); ?>
    </div>

<?php $this->endWidget(); ?>