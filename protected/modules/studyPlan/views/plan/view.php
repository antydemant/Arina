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
));

$this->endWidget();

