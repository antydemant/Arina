<?php
/**
 * @var WorkPlan $model
 */
$form = $this->beginWidget(
    BoosterHelper::FORM,
    array(
        'type' => 'horizontal',
        'htmlOptions' => array(
            'class' => 'well',
        ),
        'id'=>'graph-form',
    )
);
$this->widget(
    'studyPlan.widgets.Graph',
    array(
        'model' => $model,
        'field' => '',
        'graph' => $model->graph,
        'specialityId' => $model->speciality_id,
        'studyYearId' => $model->year_id,
        'studyPlan' => false
    )
);

$this->renderPartial('//formButtons', array('model' => $model));
$this->endWidget();