<?php
/**
 * @var $model ActiveRecord
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
?>
<div class="form-actions">
    <?php $this->widget(
        Booster::BUTTON,
        array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('base', 'Create') : Yii::t('base', 'Save')
        )
    ); ?>
    <?php $this->widget(Booster::BUTTON, array('buttonType' => 'reset', 'label' => Yii::t('base', 'Cancel'))); ?>
</div>