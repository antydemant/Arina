<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Audiences') => array('index'),
    Yii::t('audience', 'Adding new audience'),
);

$this->menu = array(
    array('label' => 'List Audience', 'url' => array('index')),
    array('label' => 'Manage Audience', 'url' => array('admin')),
);
?>

    <h1><?php echo Yii::t('audience', 'Adding new audience'); ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>