<?php
/**
 * @var TbActiveForm $form
 * @var MainController $this
 * @var \Plan $model
 */
?>
<div id="first">
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
            array('class' => 'btn', 'id' => 'submit_btn'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
<script>
    function makeHandler () {
        var button = $('#submit_btn');
        button.unbind();
        var link = button.attr('href');
        button.click(function () {
            jQuery.ajax({'success': function (html) {
                jQuery("#first").html(html);
                makeHandler();
            }, 'type': 'POST', 'url': link, 'cache': false, 'data': jQuery(this).parents("form").serialize()});
            return false;
        });
    }
    $(makeHandler());
</script>

