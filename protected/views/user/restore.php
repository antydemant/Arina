<?php
/**
 *
 * @var Controller $this
 * @var TbActiveForm $form
 * @var ERestorePasswordForm $model
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
?>
<div class="span5 offset3 text-center">
    <h2><?php echo Yii::t('base', 'Restoring of password') ?></h2>

    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'restore-form',
            'type' => 'vertical',
            'htmlOptions' => array('class' => 'well'),
            'enableAjaxValidation' => true,
        )
    ); ?>
    <?php echo $form->textFieldRow($model, 'username'); ?>
    <div class="form-actions">
        <?php $this->widget(
            'bootstrap.widgets.TbButtonGroup',
            array(
                'buttons' => array(
                    array('url' => array('/user/login'), 'label' => Yii::t('base', 'Log in'), 'icon' => 'icon-arrow-left'),
                    array('buttonType' => 'submit', 'type' => 'primary', 'label' => Yii::t('base', 'Send'), 'icon' => 'icon-ok'),
                    array('url' => array('/site/index'), 'label' => Yii::t('base', 'Home'), 'icon' => 'icon-align-justify'),
                ),
            )
        ); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>