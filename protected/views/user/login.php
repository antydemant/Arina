<?php
/**
 * @var Controller $this
 * @var TbActiveForm $form
 * @var ELoginForm $model
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
?>

<div class="span4 offset4 text-center">
    <h2><?php echo Yii::t('base', 'Log in') ?></h2>

    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'user-form',
            'type' => 'vertical',
            'htmlOptions' => array('class' => 'well'),
            'enableAjaxValidation' => true,
        )
    ); ?>
    <?php echo $form->textFieldRow($model, 'username'); ?>
    <?php echo $form->passwordFieldRow($model, 'password'); ?>
    <?php echo $form->toggleButtonRow($model, 'rememberMe'); ?>
    <div class="form-actions">
        <?php $this->widget(
            'bootstrap.widgets.TbButtonGroup',
            array(
                'buttons' => array(
                    array('buttonType' => 'submit', 'type' => 'primary', 'label' => Yii::t('base', 'Log in'), 'icon'=>'icon-ok'),
                    array('buttonType' => 'button', 'url' => array('/user/restore'), 'label' => Yii::t('base', 'Restore password'),'icon'=>'icon-repeat'),
                ),
            )
        ); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>