<?php
/**
 * @var DefaultController $this
 * @var CActiveDataProvider $dataProvider
 */
$this->breadcrumbs = array(
    'Навчальні плани',
);
?>
<?php
$this->renderPartial('/plan/index', array('dataProvider' => $dataProvider));
?>