<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    Yii::t('base', 'Specialities'),
);

$this->menu = array(
    array('label' => Yii::t('speciality', 'Create new speciality'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
);
?>

<?php
$columns = array(
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
