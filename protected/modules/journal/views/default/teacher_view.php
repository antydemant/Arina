<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'columns' => array(
            array(
                'header' => 'Група',
                'value' => '$data->group->title',
            ),
            array(
                'header' => 'Предмет',
                'value' => '$data->subject->title',
            ),
            array(
                'header' => 'Пара',
                'value' => '$data->class_number',
            ),
            array(
                'header' => 'Дата',
                'value' => '$data->date',
            ),
        ),

    )
);
?>