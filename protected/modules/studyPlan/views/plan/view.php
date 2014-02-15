<?php
/**
 * @var $this PlanController
 * @var $model Plan
 */

$this->breadcrumbs = array(
    'Навчальні плани' => $this->createUrl('index'),
    $model->study_year,
);

$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => $model->speciality->title . ': ' . $model->study_year,
    'headerIcon' => 'icon-list',
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'type' => 'primary',
            'buttons' => array(
                array('label' => 'Додати предмет', 'type' => 'inverse', 'url' => Yii::app()->createUrl('studyPlan/subject/create')),
                array('label' => 'Семестри', 'url' => Yii::app()->createUrl('studyPlan/semester/index', array('id' => $model->id))),
            )
        ),
    ),
));

$dataProvider = SpSubject::model()->getProvider();

$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    'template' => "{items}\n{pager}",
    'columns' => array(
        array('name' => 'subject.title', 'header' => 'Предмет'),
        array('name' => 'total_hours', 'header' => 'Всього годин'),
        array(
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("studyPlan/subject/view", array("id"=>$data["id"]))',
            'updateButtonUrl' => 'Yii::app()->createUrl("studyPlan/subject/update", array("id"=>$data["id"]))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("studyPlan/subject/delete", array("id"=>$data["id"]))',
        ),
    ),

));
$this->endWidget();

