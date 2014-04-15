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
        'created',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'viewButtonUrl'=> 'Yii::app()->createUrl("studyPlan/plan/view", array("id"=>$data->id))',
            'updateButtonUrl'=>'Yii::app()->createUrl("studyPlan/plan/update", array("id"=>$data->id))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("studyPlan/plan/delete", array("id"=>$data->id))',
        )
    ),
));