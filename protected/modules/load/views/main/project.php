<?php
/**
 * @var MainController $this
 * @var Load $model
 * @var TbActiveForm $form
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Load') => $this->createUrl('index'),
    $model->studyYear->title => $this->createUrl('view', array('id' => $model->study_year_id)),
    'Розподіл курсових робіт, проектів'
);
?>
<?php $form = $this->beginWidget(
    BoosterHelper::FORM,
    array(
        'id' => 'load-update-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
    )
); ?>
<h2>Розподіл курсових робіт, проектів</h2>

<?php echo $form->errorSummary($model); ?>





<?php $this->renderPartial('//formButtons', array('model' => $model)); ?>
<?php $this->endWidget(); ?>
