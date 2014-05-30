<?php
/**
 * @var WorkPlan $model
 */

$this->widget(
    'studyPlan.widgets.Graph',
    array(
        'model' => $model,
        'field' => '',
        'readOnly' => true,
        'graph' => $model->graph,
        'specialityId' => $model->speciality_id,
        'studyYearId' => $model->year_id,
        'studyPlan' => false
    )
);