<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this PlanController
 * @var $model Plan
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('index'),
    $model->study_year,
);

$this->menu = array(
    array('label' => Yii::t('studyPlan', 'Add subject'), 'type' => 'primary', 'url' => $this->createUrl('spSubject/create')),
    array('label' => Yii::t('studyPlan', 'Semesters'), 'type' => 'primary', 'url' => $this->createUrl('semester/index', array('id' => $model->id)))
);
?>

<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => $model->speciality->title . ': ' . $model->study_year,
    'headerIcon' => 'icon-list',
));

$dataProvider = SpSubject::model()->getProvider(array(
    'criteria' => array(
        'condition' => 'study_plan_id=' . $model->id,
    )
));

$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    'template' => "{items}\n{pager}",
    'columns' => array(
        array('name' => 'subject.title', 'header' => Yii::t('terms', 'Subject')),
        array('name' => 'total_hours', 'header' => Yii::t('terms', 'Hours')),
        array(
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->controller->createUrl("spSubject/view", array("id"=>$data["id"]))',
            'updateButtonUrl' => 'Yii::app()->controller->createUrl("spSubject/update", array("id"=>$data["id"]))',
            'deleteButtonUrl' => 'Yii::app()->controller->createUrl("spSubject/delete", array("id"=>$data["id"]))',
        ),
    ),
));
$this->endWidget();

