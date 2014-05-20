<?php
/* @var $this DefaultController */
/* @var array $columns */
/* @var $model Student */

$this->breadcrumbs = array(
    Yii::t("student", "Students") => array('index'),
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

<h1><?php echo Yii::t("student", "Students") ?></h1>

<?php
$this->widget(BoosterHelper::GRID_VIEW, array(
    'id' => 'student-grid',
    'dataProvider' => $dataProvider,
    //'filter' => $model,
    'responsiveTable' => true,
    'type' => 'striped condensed bordered hover',

    'columns' => array(
        'code',
        'last_name',
        'first_name',
        'middle_name',
        'birth_date',
        array(
            'name' => 'group_id',
            'value' => '$data->group->title',
            'htmlOptions' => array('width' => '50px'),
            /*'filter' => CHtml::dropDownList('Student[group_id]',
                    $model->group_id,
                    CHtml::listData(Group::model()->findAll(), 'id', 'title'),
                    array('empty' => ''))*/

        ),

        /*array(
            'header' => Yii::t('base', 'Actions'),
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}{view}',
        ),*/
    ),
));
?>


