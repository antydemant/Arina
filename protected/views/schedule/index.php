<?php
/**
 *
 * @var ScheduleController $this
 * @var CActiveDataProvider $provider
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
?>
<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Schedule'),
);
?>
<?php
$this->renderPartial('_list', array('provider' => $provider));
?>
<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>