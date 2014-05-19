<?php
/**
 * @var WorkController $this
 * @var TbActiveForm $form
 * @var integer $semester
 * @var WorkSubject $model
 */
?>

<?php $form = $this->beginWidget(
    BoosterHelper::FORM,
    array(
        'htmlOptions' => array(
            'class' => 'well',
        )
    )
); ?>

<?php echo $form->errorSummary($model); ?>
    <div class="span3">
        <?php echo $form->listBox(
            $model,
            'subject_id',
            Subject::getListForSpeciality($model->plan->speciality_id),
            array('size' => 25)
        ); ?>
    </div>
    <div class="span3">
        <?php $semesters = $model->plan->semesters; ?>
        <?php echo CHtml::label($semester.'-й семестр: '.$semesters[$semester - 1].' тижнів', ''); ?>
        <?php echo $form->numberFieldRow($model, 'total'); ?>
        <?php echo CHtml::label('Аудиторні', 'classes_'.$semester); ?>
        <?php echo CHtml::numberField('classes_'.$semester, '', array('placeholder' => 'Аудиторні', 'readonly' => true)); ?>
        <?php echo $form->numberFieldRow($model, 'lectures'); ?>
        <?php echo $form->numberFieldRow($model, 'labs'); ?>
        <?php echo $form->numberFieldRow($model, 'practs'); ?>
        <?php echo $form->numberFieldRow($model, 'weeks', array('id' => 'weeks_'.$semester)); ?>
    </div>
    <div class="span5">
        <div class="options">
            <div class="item">
                <?php echo $form->checkBox($model, "control[$semester][0]"); ?>
                <?php echo CHtml::label(Yii::t('terms', 'Test'), "StudySubject_control_{$semester}_0"); ?>
                <?php echo $form->checkBox($model, "control[$semester][1]"); ?>
                <?php echo CHtml::label(Yii::t('terms', 'Exam'), "StudySubject_control_{$semester}_1"); ?>
            </div>
            <div class="item">
                <?php echo $form->checkBox($model, "control[$semester][2]"); ?>
                <?php echo CHtml::label(Yii::t('terms', 'Course work'), "StudySubject_control_{$semester}_2"); ?>
                <?php echo $form->checkBox($model, "control[$semester][3]"); ?>
                <?php echo CHtml::label(Yii::t('terms', 'Course project'), "StudySubject_control_{$semester}_3"); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div style="clear: both"></div>
    <div class="form-actions" style="width: 200px; margin: 0 auto">
        <?php echo CHtml::submitButton('Додати', array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::button('Очистити', array('type' => 'reset', 'class' => 'btn btn-danger')); ?>
    </div>
<?php $this->endWidget(); ?>
<script>
    $(function(){
        var weeks = <?php echo $semesters[$semester - 1]; ?>;
        $("#weeks_<?php echo $semester; ?>").change(function(){
            $("#classes_<?php echo $semester; ?>").val(weeks * $("#weeks_<?php echo $semester; ?>").val());
        });
    });
</script>