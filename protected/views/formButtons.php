<?php
/**
 * @var $model ActiveRecord
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
 ?>
<div class="form-actions">
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('base', 'Create') : Yii::t('base', 'Save')
        )
    ); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => Yii::t('base', 'Reset'))); ?>
</div>