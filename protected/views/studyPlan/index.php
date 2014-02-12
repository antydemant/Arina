<?php
/**
 *
 * @var $this StudyPlanController
 * @var $dataProvider CActiveDataProvider
 *
 */

$this->breadcrumbs = array(
    Yii::t('studyPlan','Study Plan'),
);
?>
    <h1><?php echo Yii::t('studyPlan','Study Plan'); ?></h1>

<?php
$columns = array();
?>
<?php $this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns));
