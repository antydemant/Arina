<?php
$this->breadcrumbs=array(
	Yii::t('base','Study years') => array('index'),
    Yii::t('studyYears', 'Adding new study year'),
);

$this->menu = array(
	array('type' => BoosterHelper::TYPE_PRIMARY, 'label' => Yii::t('studyYears', 'Study years list'), 'url' => array('index')),
);
?>

    <h2><?php Yii::t('studyYears', 'Adding new study year'); ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>