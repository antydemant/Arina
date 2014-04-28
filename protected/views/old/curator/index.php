<?php
/**
 *
 * @var CuratorController $this
 * @var \CActiveDataProvider $groupProvider
 */
?>
<?php
$columns = array(
    array('name' => 'firstname'),
);
?>
<?php $this->renderPartial('//tableList', array('provider' => $groupProvider, 'columns' => $columns)); ?>