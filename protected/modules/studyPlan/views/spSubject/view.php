<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this SpSubjectController
 * @var $dataProvider CActiveDataProvider
 * @var $model SpSubject
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('plan/index'),
    $model->plan->study_year => $this->createUrl('plan/view/', array('id' => $model->sp_plan_id)),
    $model->subject->title,
);

$this->menu = array(
    array('label' => Yii::t('studyPlan', 'Add semester'), 'type' => Booster::TYPE_PRIMARY, 'url' => $this->createUrl('hours/create', array('id' => $model->id))),
);
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'columns' => array(
            array('name' => 'semester.semester_number'),
            array('name' => 'semester.weeks_count'),
            array('name' => 'lectures'),
            array('name' => 'labs'),
            array('name' => 'practs'),
            array('value' => '$data["lectures"]+$data["labs"]+$data["practs"]', 'header' => Yii::t('studyPlan', 'Total classes')),
            array('name' => 'selfwork'),
            array('name' => 'hours_per_week'),
            array('value' => '$data["test"]? \'Так\' : \'Ні\'', 'header' => Yii::t('terms', 'Test')),
            array('value' => '$data["exam"]? \'Так\' : \'Ні\'', 'header' => Yii::t('terms', 'Exam')),
            array('value' => '$data["course_work"]? \'Так\' : \'Ні\'', 'header' => Yii::t('terms', 'Course work')),
            array('value' => '$data["course_project"]? \'Так\' : \'Ні\'', 'header' => Yii::t('terms', 'Course project')),

            array(
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => "{update}{delete}",
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("hours/update", array("id"=>$data["id"]))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("hours/delete", array("id"=>$data["id"]))',
            ),
        )
    )
);
?>