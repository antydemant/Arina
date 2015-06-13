<?php
/* @var $this LogController */

$this->breadcrumbs=array(
    'Лог',
);
?>
<h1>Аналізатор логів</h1>
<h3>Файли:</h3>
<?php
$files = scandir(Yii::app()->getRuntimePath());
foreach($files as $file) {
    if (strpos($file, 'log') === 0) {
        echo CHtml::link($file,'/log/view/' . ((strpos($file, '.') != 0) ? substr($file, strpos($file, '.') + 1) : ''));
    }
}
?>

<?php
/*
echo '<h3>Налаштування:</h3>';
echo CHtml::beginForm();
echo CHtml::label('Максимальна кількість файлів', 'maxLogFiles');
echo CHtml::textField('maxLogFiles', Yii::app()->getComponent('log')->routes[1]->maxLogFiles) . '<br>';
echo CHtml::label('Максимальний розмір файлу (кб)', 'maxFileSize');
echo CHtml::textField('maxFileSize', Yii::app()->getComponent('log')->routes[1]->maxFileSize) . '<br>';
echo CHtml::label('Папка логів', 'logPath');
echo CHtml::textField('logPath', Yii::app()->getComponent('log')->routes[1]->logPath) . '<br>';
echo CHtml::label('Назва файлу', 'logFile');
echo CHtml::textField('logFile', Yii::app()->getComponent('log')->routes[1]->logFile) . '<br>';

echo CHtml::submitButton('Змінити', array('submit'=>'/log/'));
echo CHtml::endForm();
*/
?>