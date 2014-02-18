<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 16.02.14
 * Time: 20:26
 * @var $model SpSubject
 * @var DefaultController $this
 */
?>

<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'subject-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
        //'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        // 'action' => $this->createUrl('addSubject', array('id' => $model->study_plan_id)),
    )
);
?>

<?php echo $form->dropDownListRow($model, 'subject_id', Subject::getList()); ?>

<?php echo $form->textFieldRow($model, 'total_hours'); ?>

<div class="form-actions">
    <?php
    echo CHtml::ajaxSubmitButton('Додати', $this->createUrl('addSubject', array('id' => $model->study_plan_id)),
        array('update' => '#subject-form'), array('class' => 'btn btn-primary', 'id' => 'subj_btn'));
    ?>

</div>
<?php $this->endWidget(); ?>
<div id="test"></div>