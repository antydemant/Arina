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
<style>
    .input,
    .options {
        float: left;
    }

    .options input {
        float: left;
    }

    .options {
        margin: 15px 0 0 15px;
    }

    .options:after {
        content: '';
        display: block;
        clear: both;
    }

    .options .item {
        float: left;
        width: 125px;
    }

    .span5 input[type="number"] {
        width: 170px;
    }

    #StudySubject_subject_id {
        width: 100%;
    }
</style>
<?php $form = $this->beginWidget(BoosterHelper::FORM, array(
    'htmlOptions' => array(
        'class' => 'well row',
    )
)); ?>
<h3>Додання предметів</h3>
<?php echo $form->errorSummary($model); ?>
<div class="span3">
    <?php echo $form->listBox($model, 'subject_id',
        Subject::getListForSpeciality($speciality_id), array('size' => 25)); ?>
</div>
<div class="span3">
    <?php echo $form->numberFieldRow($model, 'total'); ?>
    <?php echo CHtml::label('Аудиторні', 'classes'); ?>
    <?php echo CHtml::numberField('classes', '', array('placeholder' => 'Аудиторні', 'disabled' => true)); ?>
    <?php echo $form->numberFieldRow($model, 'lectures'); ?>
    <?php echo $form->numberFieldRow($model, 'labs'); ?>
    <?php echo $form->numberFieldRow($model, 'practs'); ?>
</div>
<div class="span5">
    <?php foreach ($model->plan->semesters as $semester => $weeks): ?>
        <div class="input">
            <?php echo CHtml::label($semester + 1 . '-й семестр: ' . $weeks . ' тижнів', 'StudySubject_weeks_' . $semester); ?>
            <?php echo $form->numberField($model, "weeks[$semester]", array('placeholder' => 'годин на тиждень')); ?>
        </div>
        <div class="options">
            <div class="item">
                <?php echo $form->radioButtonList($model, "control[$semester][0]",
                    PlanHelper::getControlTypes(), array('template' => '{input}{label}', 'separator' => ' ')); ?>
            </div>
            <div class="item">
                <?php echo $form->checkBox($model, "control[$semester][1]"); ?>
                <?php echo CHtml::label(Yii::t('terms', 'Course work'), "StudySubject_control_{$semester}_1"); ?>
                <?php echo $form->checkBox($model, "control[$semester][2]"); ?>
                <?php echo CHtml::label(Yii::t('terms', 'Course project'), "StudySubject_control_{$semester}_2"); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php endforeach; ?>
</div>
<div style="clear: both"></div>
<div class="form-actions" style="width: 300px; margin: 0 auto">
    <?php echo CHtml::submitButton('Додати', array('class' => 'btn btn-primary')); ?>
    <?php echo CHtml::link('Завершити', $this->createUrl('index'), array('class' => 'btn btn-info')); ?>
</div>
<?php $this->endWidget(); ?>

<?php $this->widget('studyPlan.widgets.SubjectTable', array(
    'subjectDataProvider' => $model->plan->getPlanSubjectProvider()
));
?>

<script>
    $(
        $("input[id^='StudySubject_weeks_']").change(function () {
            var weeks = [
                <?php echo implode(', ', $model->plan->semesters); ?>
            ];
            var classes = 0;
            for (i = 0; i < 8; i++) {
                if ($("#StudySubject_weeks_" + i).val())
                    classes += weeks[i] * parseInt($("#StudySubject_weeks_" + i).val());
            }
            $("#classes").val(classes);
        })
    )
</script>