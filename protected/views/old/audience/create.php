<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Audiences') => array('index'),
    Yii::t('audience', 'Adding new audience'),
);

$this->menu = array(
    array('type' => Booster::TYPE_PRIMARY, 'label' => Yii::t('audience', 'Audience list'), 'url' => array('index')),
);
?>

    <h2><?php echo Yii::t('audience', 'Adding new audience'); ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>