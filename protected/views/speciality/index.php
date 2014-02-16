<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    Yii::t('base', 'Specialities'),
);

$this->menu = array(
    array('label' => 'List Speciality', 'url' => array('index')),
    array('label' => 'Create Speciality', 'url' => array('create')),
);
?>

<?php
$columns = array(
    'id',
    'number',
    'title',
    array(
        'header' => Yii::t('base', 'Actions'),
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{update}{delete}{view}',
    ),
);

$this->renderPartial('//tableList', array('provider' => $model->search(), 'columns' => $columns));


?>
