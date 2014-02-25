<?php
/**
 * @var $this \SubjectController
 * @var $dataProvider CActiveDataProvider
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Subjects'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Create Subject'), 'url' => array('create')),
    array('label' => 'Manage Subject', 'url' => array('admin')),
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
);
$this->renderPartial('//tableList', array('columns' => $columns, 'provider' => $dataProvider));
?>
