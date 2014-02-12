<?php
/**
 *
 * @var StudyPlanController $this
 * @var \CActiveDataProvider $dataProvider
 */
?>

<?php
$this->widget(
    Booster::GRID_VIEW,
    array(
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'columns' => array(
            'semester_number',
            'weeks_count',
        ),
        'responsiveTable' => true,
        'type' => 'striped condensed bordered hover',
    )
);
?>