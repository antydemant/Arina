<?php
/**
 * @var WorkController $this
 * @var CActiveDataProvider $dataProvider
 */
$this->breadcrumbs = array(
    'Робочі плани' => $this->createUrl('/studyPlan'),
);
?>

<?php $this->widget(BoosterHelper::GRID_VIEW, array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        array(
            'name' => 'speciality.title',
            'value' => 'CHtml::link($data->speciality->title, array("view", "id"=>$data->id))',
            'type' => 'raw'
        ),
        array(
            'name' => 'year.title',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}{view}{excel}',
            'viewButtonUrl' => 'Yii::app()->createUrl("studyPlan/work/view", array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("studyPlan/work/update", array("id"=>$data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("studyPlan/work/delete", array("id"=>$data->id))',
            'buttons' => array(
                'excel' => array(
                    'label' => Yii::t('base', 'Create document'),
                    'icon' => 'icon-file',
                    'url' => 'Yii::app()->createUrl("/studyPlan/work/makeExcel", array("id"=>$data->id))',
                ),
            ),
        )
    ),
));