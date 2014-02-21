<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    Yii::t('base', 'Specialities') => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Speciality', 'url' => array('index')),
    array('label' => 'Create Speciality', 'url' => array('create')),
    array('label' => 'View Speciality', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Speciality', 'url' => array('admin')),
);
?>

    <h1>Update Speciality <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>