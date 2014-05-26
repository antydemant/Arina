<?php
/* @var $this StudyYearController */
/* @var $model StudyYear */

$this->breadcrumbs=array(
    Yii::t('base', 'Study Years') => array('index'),
    Yii::t('studyYears', 'Update study year') . " {$model -> title}",
);

$this->menu = array(
    array('type' => BoosterHelper::TYPE_PRIMARY, 'label' => Yii::t('studyYears', 'Study years list'), 'url' => array('index')),

	array(
        'label' => Yii::t('studyYears', 'Delete study year'),
        'url' => $this -> createUrl('delete', array('id' => $model->id)),
        'icon' => 'trash',
        'htmlOptions' => array(
                'submit' => array(
                    'delete',
                    'id' => $model->id,
                ),
                'confirm' => Yii::t('base', 'Do you want delete this item?'),
        ),
    ),
);
?>

<h2><?php echo Yii::t('studyYears', 'Update study year') . " {$model -> title}"; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>