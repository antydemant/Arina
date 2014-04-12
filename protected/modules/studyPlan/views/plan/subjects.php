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
<?php echo $form->listBox($model, 'subject_id', Subject::getList(), array('size' => 25)); ?>
<?php $this->endWidget(); ?>