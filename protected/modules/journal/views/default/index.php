<?php
/* @var $this DefaultController */
/* @var $model Group */

$this->breadcrumbs = array(
    Yii::t('base', 'Journal'),
);
?>
<h1><?php echo Yii::t('base', 'Journal'); ?></h1>

<?php
echo CHtml::dropDownList('Student[group_id]',
    $model->id,
    CHtml::listData(Group::model()->findAll(), 'id', 'title'),
    array('empty' => ''));
echo CHtml::dropDownList('Subject',
    Subject::model()->id,
    CHtml::listData(Subject::model()->findAll(), 'id', 'title'),
    array('empty' => ''));

?>