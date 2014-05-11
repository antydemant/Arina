<?php
/**
 * @var Controller $this
 * @var \CActiveDataProvider $provider
 * @var array $columns
 */
?>

<?php
if (!isset($filter)) {
    $filter = null;
}
$this->widget(
    BoosterHelper::GRID_VIEW,
    array(
        'dataProvider' => $provider,
        'filter' => $filter,
        'columns' => $columns,
        'responsiveTable' => true,
        'type' => 'striped condensed bordered hover',
    )
);
?>