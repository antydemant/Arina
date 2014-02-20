<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this PlanController
 * @var $dataProvider CActiveDataProvider
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Study plans'),
);

$this->menu = array(
    array(
        'type' => Booster::TYPE_PRIMARY,
        'label' => Yii::t('studyPlan', 'Create new plan'),
        'url' => $this->createUrl('createInfo'),
    ),
);
?>

<?php
$columns = array(
    array('name' => 'speciality.title', 'header' => Yii::t('terms', 'Speciality')),
    array('name' => 'study_year', 'header' => Yii::t('terms', 'Study year')),
    array(
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'viewButtonUrl' => 'Yii::app()->controller->createUrl("plan/view", array("id"=>$data["id"]))',
        'updateButtonUrl' => 'Yii::app()->controller->createUrl("plan/update", array("id"=>$data["id"]))',
        'deleteButtonUrl' => 'Yii::app()->controller->createUrl("plan/delete", array("id"=>$data["id"]))',
    ),
);

$this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns));

?>
