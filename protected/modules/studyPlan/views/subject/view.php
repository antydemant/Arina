<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 14.02.14
 * Time: 17:40
 * @var $this SubjectController
 * @var $dataProvider CActiveDataProvider
 * @var $model SpSubject
 */

$this->breadcrumbs = array(
    'Навчальні плани' => $this->createUrl('index'),
    $model->plan->study_year => $this->createUrl('/studyPlan/plan/view/', array('id' => $model->study_plan_id)),
    $model->subject->title,
);
?>
    <header>
        <?php $this->widget(
            Booster::BUTTON_GROUP,
            array(
                'buttons' => array(
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => 'Додати семестр',
                        'url' => $this->createUrl('hours/create'),
                    ),
                ),
            )
        )
        ?>
    </header>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'columns' => array(
            array('name' => 'semester.semester_number', 'header' => '№ семестру'),
            array('name' => 'semester.weeks_count', 'header' => 'К-сть тижнів'),
            array('name' => 'lectures', 'header' => 'Лекції'),
            array('name' => 'labs', 'header' => 'Лабораторні'),
            array('name' => 'practs', 'header' => 'Практичні'),
            array('value' => '$data["lectures"]+$data["labs"]+$data["practs"]', 'header' => 'Усього аудиторних'),
            array('name' => 'selfwork', 'header' => 'Самостійна робота'),
            array('name' => 'hours_per_week', 'header' => 'Годин на тиждень'),
            array('value' => '$data["test"]? \'Так\' : \'Ні\'', 'header' => 'Залік'),
            array('value' => '$data["exam"]? \'Так\' : \'Ні\'', 'header' => 'Екзамен'),
            array('value' => '$data["course_work"]? \'Так\' : \'Ні\'', 'header' => 'Курсова робота'),
            array('value' => '$data["course_project"]? \'Так\' : \'Ні\'', 'header' => 'Курсовий проект'),

            array(
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("hours/view", array("id"=>$data["id"]))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("hours/update", array("id"=>$data["id"]))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("hours/delete", array("id"=>$data["id"]))',
            ),
        )
    )
);
?>