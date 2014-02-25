<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
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

<h1>Manage Students</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'code',
		'last_name',
		'first_name',
		'middle_name',
		'group_id',
		/*
		'phone_number',
		'mobile_number',
		'mother_name',
		'father_name',
		'gender',
		'official_address',
		'characteristics',
		'factual_address',
		'birth_date',
		'admission_date',
		'tuition_payment',
		'admission_order_number',
		'admission_semester',
		'entry_exams',
		'education_document',
		'contract',
		'math_mark',
		'ua_language_mark',
		'mother_workplace',
		'mother_position',
		'mother_workphone',
		'mother_boss_workphone',
		'father_workplace',
		'father_position',
		'father_workphone',
		'father_boss_workphone',
		'graduated',
		'graduation_date',
		'graduation_basis',
		'graduation_semester',
		'graduation_order_number',
		'diploma',
		'direction',
		'misc_data',
		'hobby',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
