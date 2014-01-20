<?php
/**
 * @var Controller $this
 * @var \CActiveDataProvider $provider
 * @var array $columns
 */
?>

<?php
$this->widget(
    Booster::GRID_VIEW,
    array(
        'dataProvider' => $provider,
        'template' => "{items}",
        'columns' => $columns,
        'responsiveTable' => true,
        'type' => 'striped condensed bordered hover',
    )
);
?>
