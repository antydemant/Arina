<?php
/* @var $this DefaultController */
/* @var $model Group */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<?php
echo CHtml::dropDownList('Student[group_id]',
					$model->id,
					CHtml::listData(Group::model()->findAll(),'id','title'),
					array('empty' => ''));
echo CHtml::dropDownList('Subject',
					Subject::model()->id,
					CHtml::listData(Subject::model()->findAll(),'id','title'),
					array('empty' => ''));
$prov = new CActiveDataProvider('Student');
$this->widget(
		'bootstrap.widgets.TbExtendedGridView',
		array(
				'type' => 'striped bordered',
				'dataProvider' => $model,
				'template' => "{items}",
				'columns' => array(
						array(
								'name' => 'title',
								//'value' => '$data->last_name',
								'header' => '#',
								'htmlOptions' => array('style' => 'width: 60px')
						),
						array('name' => 'classes.marks', 'header' => '19.06'),
						array(
								'htmlOptions' => array('nowrap' => 'nowrap'),
								'class' => 'bootstrap.widgets.TbButtonColumn',
								'viewButtonUrl' => null,
								'updateButtonUrl' => null,
								'deleteButtonUrl' => null,
						)
				)
		)
);

?>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>