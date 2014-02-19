<?php
/**
 * @var $this MainController
 * @var $model PlanSemesters
 * @var $form TbActiveForm
 */
?>
    <div id="reloaded">
        <?php $form = $this->beginWidget(Booster::FORM, array(
            'id' => 'semester-form',
            'htmlOptions' => array('class' => 'well span10'),
            'enableClientValidation' => true,
        ));?>
        <div class="span3">
            <div><strong><?php echo 'Предмети у плані'; ?></strong></div>
            <?php echo $form->dropDownListRow($model,
                'subjectId',
                CHtml::listData(SpSubject::model()->findAll("study_plan_id=$model->planId"), 'subject_id', 'subject.title'),
                array('multiple' => true)); ?>
        </div>
        <div class="span3">
            <?php
            echo $form->textFieldRow($model, 'lectures');
            echo $form->textFieldRow($model, 'labs');
            echo $form->textFieldRow($model, 'practs');
            echo $form->textFieldRow($model, 'selfwork');
            echo $form->textFieldRow($model, 'hours_per_week');
            echo $form->checkBoxRow($model, 'test');
            echo $form->checkBoxRow($model, 'exam');
            echo $form->checkBoxRow($model, 'course_work');
            echo $form->checkBoxRow($model, 'course_project');
            ?>
            Hours form
        </div>
        <div class="span4">
            Semesters form
        </div>
        <?php $this->endWidget(); ?>
    </div>

    <script>
        $(makeHandler());
    </script>
<?php