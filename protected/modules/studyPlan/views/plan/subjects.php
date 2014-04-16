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
<?php $form = $this->beginWidget(Booster::FORM, array(
    'htmlOptions' => array(
        'class' => 'well',
    )
)); ?>
    <h3>Додання предметів</h3>
<?php echo $form->errorSummary($model); ?>
    <div style="float: left; margin-right: 30px">
        <?php echo $form->listBox($model, 'subject_id', Subject::getList(), array('size' => 25)); ?>
    </div>
    <div style="float: left; margin-right: 30px">
        <?php echo $form->numberFieldRow($model, 'total'); ?>
        <?php echo $form->numberFieldRow($model, 'lectures'); ?>
        <?php echo $form->numberFieldRow($model, 'labs'); ?>
        <?php echo $form->numberFieldRow($model, 'practs'); ?>
    </div>
    <div style="float: left">
        <?php foreach ($model->plan->semesters as $semester => $weeks): ?>
            <?php echo CHtml::label($semester + 1 . '-й семестр: ' . $weeks . ' тижнів', 'StudySubject_weeks_' . $semester); ?>
            <?php echo $form->numberField($model, "weeks[$semester]", array('placeholder' => 'годин на тиждень')); ?>
            <br/>
            <?php echo $form->radioButtonList($model, "control[$semester][0]", PlanHelper::getControlTypes()); ?>
            <?php echo $form->checkBox($model, "control[$semester][1]"); ?>
            <?php echo CHtml::label(Yii::t('terms', 'Course work'), "StudySubject_control_{$semester}_1"); ?>
            <?php echo $form->checkBox($model, "control[$semester][2]"); ?>
            <?php echo CHtml::label(Yii::t('terms', 'Course project'), "StudySubject_control_{$semester}_2"); ?>
        <?php endforeach; ?>
    </div>
    <div style="clear: both"></div>
    <div class="form-actions" style="width: 300px; margin: 0 auto">
        <?php echo CHtml::submitButton('Додати', array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Завершити', $this->createUrl('index'), array('class' => 'btn btn-info')); ?>
    </div>
<?php $this->endWidget(); ?>

<?php
$semesterColumns = array();
for ($i = 0; $i < 8; $i++)
    $semesterColumns[] = array('header' => $i + 1, 'value' => '$data->weeks[' . $i . ']');
?>

<?php $this->widget(Booster::GRID_VIEW, array(
    'dataProvider' => $model->plan->getPlanSubjectProvider(),
    'columns' => array_merge(
        array(
            array(
                'name' => 'subject_id',
                'value' => '$data->subject->title',
                'sortable' => true,
            ),
            array('name' => 'total'),
            array('name' => 'classes'),
            array('name' => 'lectures'),
            array('name' => 'labs'),
            array('name' => 'practs'),
            array('name' => 'selfwork')
        ),
        $semesterColumns),
));
?>