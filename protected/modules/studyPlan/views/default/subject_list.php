<?php
/**
 * @var $this DefaultController
 * @var $model Plan
 * @var $dataProvider CActiveDataProvider
 */
$model->id = 8;
?>
<h3>Предмети</h3>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name' => 'subject.title', 'header' => 'Предмет'),
        array('name' => 'total_hours', 'header' => 'Всього годин'),
        array(
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("studyPlan/subject/view", array("id"=>$data["id"]))',
            'updateButtonUrl' => 'Yii::app()->createUrl("studyPlan/subject/update", array("id"=>$data["id"]))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("studyPlan/subject/delete", array("id"=>$data["id"]))',
        ),
    ),
));
?>
<div class="form-actions">
    <?php echo CHtml::ajaxLink('Додати предмет', $this->createUrl('default/addSubject', array('id' => $model->id)),
        array('replace' => '#add-subject'), array('class' => 'btn', 'id' => 'popup-btn')); ?>
</div>
<div id="add-subject"></div>