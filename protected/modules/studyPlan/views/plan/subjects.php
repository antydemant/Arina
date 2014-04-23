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
<?php $form = $this->beginWidget(Booster::FORM, array(
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

<?php
$semesterColumns = array();
for ($i = 0; $i < 8; $i++)
    $semesterColumns[] = array('header' => $i + 1, 'value' => '$data->weeks[' . $i . ']');
?>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'dataProvider' => $model->plan->getPlanSubjectProvider(),
    'responsiveTable' => true,
    'type' => 'striped bordered',
    'bulkActions' => array(
        'checkBoxColumnConfig' => array(
            'name' => 'id',
            'header' => null,
        ),
        'actionButtons' => array(
            array(
                'id' => 'delete-btn',
                'buttonType' => 'button',
                'type' => 'danger',
                'label' => 'Видалити виділенні записи',
                'click' => 'js:
                function(){
                    var values = $("#yw1").yiiGridView("getChecked", "yw1_c0");
                    window.location.assign("' . $this->createUrl('delete', array('id' => $model->plan_id)) . '&subjects=["+values+"]");
                }'
            )
        ),
    ),
    'columns' => array_merge(
        array(
            array(
                'name' => 'subject_id',
                'value' => '$data->subject->title',
            ),
            array('name' => 'total'),
            array('name' => 'classes'),
            array('name' => 'lectures'),
            array('name' => 'labs'),
            array('name' => 'practs'),
            array('name' => 'selfwork'),
            array('name' => 'testSemesters'),
            array('name' => 'examSemesters'),
            array('name' => 'workSemesters'),
            array('name' => 'projectSemesters'),
        ),
        $semesterColumns,
        array(
            array(
                'header' => Yii::t('base', 'Actions'),
                'template' => '{update}{delete}',
                'class' => Booster::GRID_BUTTON_COLUMN,
            )
        )
    ),
));
?>