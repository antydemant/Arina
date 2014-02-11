<?php
/**
 *
 * @var $this StudyPlanController
 * @var $dataProvider CActiveDataProvider
 *
 */

$this->breadcrumbs = array(
    'Study Plan',
);
?>
    <h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
$columns = array();
?>
<?php $this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns));
