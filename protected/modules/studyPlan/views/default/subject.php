<?php
/**
 * @var $this DefaultController
 * @var $model Plan
 * @var $dataProvider CActiveDataProvider
 */

$cs = Yii::app()->clientScript;
$cs->coreScriptPosition = CClientScript::POS_HEAD;
$cs->scriptMap = array();
$baseUrl = Yii::app()->baseUrl;
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerScriptFile($baseUrl . '/js/fancybox/jquery.fancybox-1.3.1.pack.js');
$cs->registerCssFile($baseUrl . '/js/fancybox/jquery.fancybox-1.3.1.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/popup.js');
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
    <?php echo CHtml::link('Додати предмет', $this->createUrl('default/addSubject', array('id' => $model->id)), array('class' => 'btn', 'id' => 'popup-btn')); ?>
</div>
<div id="popup"></div>