<?php
/**
 * @var $this \SubjectController
 * @var $dataProvider CActiveDataProvider
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Subjects'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Create subject'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
);
?>

<h2><?php echo Yii::t('subject', 'Subject list'); ?></h2>

<?php
$columns = array(
    'title',
    array(
        'type' => 'raw',
        'name' => 'cycle_id',
        'value' => 'CHtml::link($data->cycle->title, array("cycle/view","id"=>$data->cycle_id))',
    ),
    array(
        'header' => Yii::t('base', 'Actions'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template'=>'{update}{delete}',
    ),
);
$this->renderPartial('//tableList', array('columns' => $columns, 'provider' => $dataProvider));
?>
