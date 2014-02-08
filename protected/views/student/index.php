<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
/* @var array $columns */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Student', 'url'=>array('create')),
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

<h1>Students</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget(Booster::GRID_VIEW, array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'code',
		'last_name',
		'first_name',
		'middle_name',
		array(
			'name' => 'group',
			'value' =>'$data->group->title',
		),
		array(
			'header' => Yii::t('base', 'Actions'),
			'htmlOptions' => array('nowrap' => 'nowrap'),
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'template' => '{update}{delete}{view}',
	
			'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id"=>$data->id))',
			'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data->id))',
			'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id"=>$data->id))',
		),
		/*
		'phone_number',
		'mobile_number',
		'mother_name',
		'father_name',
		'gender',
		'address',
		'characteristics',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
