<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 16.02.14
 * Time: 20:26
 * @var $model SpSubject
 */
?>

<?php $form = $this->beginWidget(
    Booster::FORM,
    array(
        'id' => 'subject-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
        'enableAjaxValidation' => true,
    )
);
?>

<?php echo $form->dropDownListRow($model, 'subject_id', CHtml::listData(Subject::model()->findAll(), 'id', 'title')); ?>

<?php echo $form->textFieldRow($model, 'total_hours'); ?>
<div class="form-actions">
    <?php
    //TODO add ajaxSubmitButton
    ?>

</div>
<?php $this->endWidget(); ?>
