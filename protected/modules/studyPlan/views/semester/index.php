<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var SemesterController $this
 * @var \CActiveDataProvider $dataProvider
 * @var Plan $model
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('main/index'),
    $model->study_year => $this->createUrl('plan/view', array('id' => $model->id)),
    Yii::t('base', 'Semesters')
);

$this->menu = array(
    array(
        'type' => Booster::TYPE_PRIMARY,
        'label' => Yii::t('studyPlan', 'Add semester'),
        'url' => $this->createUrl('create', array('id' => $model->id))
    ),
);
?>

<?php
$this->widget(
    Booster::GRID_VIEW,
    array(
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'columns' => array(
            array('name' => 'semester_number'),
            array('name' => 'weeks_count'),
            array(
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => "{update}{delete}",
                'updateButtonUrl' => 'Yii::app()->createUrl("studyPlan/semester/update", array("id"=>$data["id"]))',
                'deleteButtonUrl' => 'Yii::app()->createUrl("studyPlan/semester/delete", array("id"=>$data["id"]))',
            ),
        ),
        'responsiveTable' => true,
        'type' => 'striped condensed bordered hover',
    )
);
?>