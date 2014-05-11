<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Subjects') => array('index'),
    Yii::t('base', 'Create'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Subject list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
);
?>
    <h2><?php echo Yii::t('base', 'Creating'); ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>