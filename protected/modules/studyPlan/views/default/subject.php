<?php
/**
 * @var $this DefaultController
 * @var $model Plan
 * @var $dataProvider CActiveDataProvider
 */

/*
 * 'buttons' => array(
                array('label' => 'Додати предмет', 'type' => 'inverse', 'url' => Yii::app()->createUrl('studyPlan/subject/create')),
                array('label' => 'Семестри', 'url' => Yii::app()->createUrl('studyPlan/semester/index', array('id' => $model->id))),
            )
 */
?>
<h3>Предмети</h3>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    'template' => "{items}\n{pager}",
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
    <?php
    echo TbHtml::ajaxSubmitButton('Додати предмет', $this->createUrl('ajaxPlan'), //$this->createUrl('addSubject', array('id' => $model->id)),
        array('update' => '#popup'),
        array('class' => 'btn', 'id' => 'popup-btn-' . uniqid())
    ); ?>
</div>
<div id="popup"></div>

