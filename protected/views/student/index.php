<?php
/**
 *
 * @var StudentController $this
 * @var \CActiveDataProvider $provider
 */
?>
<?php $this->renderPartial('//tableList',
    array(
        'provider' => $provider,
        'columns' => $columns,
    )
);
?>