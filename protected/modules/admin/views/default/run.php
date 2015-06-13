<?php
/**
 *
 * @var DefaultController $this
 */
?>
<?php echo TbHtml::beginForm($this->createUrl('run'), 'GET', array('class' => 'well form-horizontal')); ?>
<?php echo TbHtml::textField('args', $args); ?>
    <div class="form-actions">
        <?php echo TbHtml::submitButton('Run'); ?></div>
<?php echo TbHtml::endForm(); ?>
    <pre>
    <?php echo $result; ?>
</pre>
<?php if ($confirm): ?>
    <div class="form-actions well">
        <?php echo CHtml::link('Confirm', array('confirm', 'args' => $args), array('class' => 'btn btn-info')); ?>
    </div>
<?php endif; ?>