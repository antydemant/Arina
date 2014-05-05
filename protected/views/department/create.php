<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Departments') => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => Yii::t('department', 'Departments list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),
);
?>

    <h1><?php echo Yii::t('department', 'Create new department')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>