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
    Booster::GRID_VIEW,
    array(
        'dataProvider' => $provider,
        'template' => "{items}{pager}",
        'filter'=>$filter,
        'columns' => $columns,
        'responsiveTable' => true,
        'type' => 'striped condensed bordered hover',
    )
);
?>
