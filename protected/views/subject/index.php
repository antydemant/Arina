<?php
/**
 * @var $this \SubjectController
 * @var $cycle_id
 * @var $speciality_id
 * @var $dataProvider CActiveDataProvider
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Subjects'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Create subject'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),
);
?>
<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_VERTICAL,$this->createUrl(''),'GET',array('id'=>'filter-form')); ?>
<?php echo TbHtml::dropDownListControlGroup('Speciality', $speciality_id,
    CHtml::listData(Speciality::model()->findAll(), 'id', 'title'),
    array('class'=>'span6','label'=>Yii::t('base','Speciality'),'empty'=>'')); ?>
<?php echo TbHtml::dropDownListControlGroup('Cycle', $cycle_id,
    CHtml::listData(SubjectCycle::model()->findAll(), 'id', 'title'),
    array('class'=>'span6','label'=>Yii::t('base','Cycle'),'empty'=>'')); ?>
<?php echo TbHtml::submitButton(Yii::t('base','Filter')); ?>
<?php echo TbHtml::endForm(); ?>

<h2><?php echo Yii::t('subject', 'Subject list'); ?></h2>

<?php
$columns = array(
    'title',
    'code',
    'short_name',
    array(
        'header' => Yii::t('base', 'Actions'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{update}{delete}',
    ),
);
$this->renderPartial('//tableList', array('columns' => $columns, 'provider' => $dataProvider));
?>
