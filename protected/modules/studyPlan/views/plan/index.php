<?php
/**
 * @var $this PlanController
 * @var $dataProvider CActiveDataProvider
 */

$this->breadcrumbs = array(
    'Навчальні плани',
);
?>
    <header>
        <?php $this->widget(
            Booster::BUTTON_GROUP,
            array(
                'buttons' => array(
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => Yii::t('studyPlan', 'Create new plan'),
                        'url' => $this->createUrl('create'),
                    ),
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => Yii::t('studyPlan', 'Create new plan')." D",
                        'url' => array('main/createInfo'),
                    ),
                ),
            )
        )
        ?>
    </header>
<?php
$columns = array(
    array('name'=>'speciality.title', 'header'=>'Спеціальність'),
    array('name'=>'study_year', 'header'=>'Навчальний рік'),
    array(
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
        'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
        'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"]))',
    ),
);
?>
<?php $this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns));
