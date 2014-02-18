<?php
/**
 * @var TbActiveForm $form
 * @var MainController $this
 * @var \Plan $model
 */
?>
<div id="reloaded">
    <?php $form = $this->beginWidget(Booster::FORM, array(
            'id' => 'plan-form',
            'type' => 'horizontal',
            'htmlOptions' => array('class' => 'well span10'),
        )
    ); ?>

    <?php echo $form->dropDownListRow($model, 'speciality_id', Speciality::getList()); ?>

    <?php echo $form->textFieldRow($model, 'study_year'); ?>
    <div class="form-actions">
        <?php echo CHtml::link(
            $model->isNewRecord ? 'Create' : 'Save',
            $this->createUrl('createInfo'),
            array('class' => 'btn bind', 'id' => 'yt0'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
<script>
    $(makeHandler());
</script>

