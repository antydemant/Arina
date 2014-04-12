<?php
/**
 * @var PlanController $this
 * @var StudySubject $model
 * @var TbActiveForm $form
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('main/index'),
    $model->plan->speciality->title => $this->createUrl('plan/view', array('id' => $model->plan->id)),
);
?>
<?php $form = $this->beginWidget(Booster::FORM); ?>
    <h3>Додання предметів</h3>
    <div>
        <?php echo $form->listBox($model, 'subject_id', Subject::getList(), array('size' => 25)); ?>
    </div>
    <div>
        <?php echo $form->numberFieldRow($model, 'total'); ?>
        <?php echo $form->numberFieldRow($model, 'lectures'); ?>
        <?php echo $form->numberFieldRow($model, 'labs'); ?>
        <?php echo $form->numberFieldRow($model, 'practs'); ?>
    </div>
    <div>
        <?php
        foreach ($model->plan->semesters as $semester => $weeks) {
            echo CHtml::label($semester+1 . '-й семестр: '.$weeks.' тижнів', '');
            echo $form->numberField($model, "weeks[$semester]", array('placeholder'=>'годин на тиждень'));
        }
        ?>
    </div>
<div class="form-actions">
    <?php echo CHtml::submitButton('Додати', array('class' => 'btn btn-primary')); ?>
    <?php echo CHtml::link('Далі', '#', array('class'=>'btn btn-info')); ?>
</div>
    <div style="clear: both"></div>
<?php $this->endWidget(); ?>