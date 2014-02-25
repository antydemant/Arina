<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Cyclic commissions') => array('index'),
    Yii::t('teacher', 'Creating new cyclic commission'),
);

$this->menu = array(
    array('label' => Yii::t('teacher', 'Commissions list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),
);
?>

    <h2><?php echo Yii::t('teacher', 'Creating new cyclic commission'); ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>