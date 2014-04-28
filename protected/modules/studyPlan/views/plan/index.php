<?php
/**
 * @var PlanController $this
 * @var CActiveDataProvider $dataProvider
 */
?>

<?php $this->widget(Booster::GRID_VIEW, array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        'speciality.title',
        'updated',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}{view}{excel}',
            'viewButtonUrl'=> 'Yii::app()->createUrl("studyPlan/plan/view", array("id"=>$data->id))',
            'updateButtonUrl'=>'Yii::app()->createUrl("studyPlan/plan/update", array("id"=>$data->id))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("studyPlan/plan/delete", array("id"=>$data->id))',
            'buttons'=>array(

                'excel' => array(
                    'label' => Yii::t('base', 'Create document'),
                    'icon' => 'icon-file',
                    'url' => 'Yii::app()->createUrl("/studyPlan/plan/makeExcel", array("id"=>$data->id))',
                ),
            ),
        )
    ),
));