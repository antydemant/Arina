<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<?php

$this->widget(
		'bootstrap.widgets.TbExtendedGridView',
		array(
				'type' => 'striped bordered',
				'dataProvider' => new CActiveDataProvider('ClassMark', array(
						'criteria' => array(
								'limit' => 10,
								'order' => 'RAND()'
						)
				)),
				'template' => "{items}",
				'columns' => array(
						array(
								'name' => 'id',
								'header' => '#',
								'htmlOptions' => array('style' => 'width: 60px')
						),
						array('name' => 'country_code', 'header' => '19.06'),
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