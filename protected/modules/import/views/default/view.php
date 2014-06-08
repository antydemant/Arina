<?php
/* @var $this DefaultController */
/* @var array $columns */
/* @var $model Student */

$this->breadcrumbs = array(
    Yii::t('student', 'Students') => array('index'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('student', 'Students') ?></h1>

<?php
$this->widget(BoosterHelper::GRID_VIEW, array(
    'id' => 'student-grid',
    'dataProvider' => $dataProvider,
    //'filter' => $model,
    'responsiveTable' => true,
    'type' => 'striped condensed bordered hover',

    'columns' => array(
        array(
            'name' => Yii::t('student', 'Full name'),
            'value' => '$data->getFullName()'
        ),
        array(
            'name' => Yii::t('student', 'Birth Date'),
            'value' => '$data->birth_date'
        ),

        array(
            'name' => Yii::t('group', 'Group'),
            'value' => '$data->group->title',
            'htmlOptions' => array('width' => '50px'),
        ),
    ),
));
?>


