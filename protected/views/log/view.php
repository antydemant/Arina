<?php
/* @var $this LogController */
/* @var $model String */

$this->breadcrumbs=array(
    'Лог' => 'index',
    'Перегляд',
    $model,
);
?>
<?php
$title = 'Журнал активності';
if ($model != '') {
    $title = $title . ', файл #' . $model;
}
$this->widget('ext.loganalyzer.LogAnalyzerWidget',
    array( 'filters' => array('[record]'),
        'title' => $title,
        'log_file_path' => Yii::app()->getRuntimePath().DIRECTORY_SEPARATOR.'log'.($model!='' ? '.'.$model : ''),
    ));
?>