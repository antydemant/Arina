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
