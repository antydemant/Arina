<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Update Student', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>View Student #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'last_name',
		'first_name',
		'middle_name',
		'group_id',
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
	),
)); ?>
