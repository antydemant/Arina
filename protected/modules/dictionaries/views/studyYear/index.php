<?php
/* @var $this StudyYearController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('base', 'Study years'),
);

$this->menu=array(
	array(
        'type' => BoosterHelper::TYPE_PRIMARY,
        'label' => Yii::t('studyYears', 'Adding new study year'),
	    'url' => $this -> createUrl('create'),
    ),
);
?>

<?php
$columns = array(
    'begin',
    'end',
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{delete}{update}',
        'header' => Yii::t('base', 'Actions'),
    ),
);

$this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns,));
?>
