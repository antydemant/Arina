<?php
/**
 * @var $this HoursController
 * @var $model Hours
 */
$this->breadcrumbs = array(
    Yii::t('base', 'StudyPlan') => $this->createUrl('plan/index'),
    $model->spSubject->subject->title => $this->createUrl('subject/view', array('id' => $model->study_plan_subject_id)),
    'Семестр # ' . $model->semester->semester_number,

);
?>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'spSubject.subject.title',
            'label' => 'Предмет',
        ),
        array(
            'name' => 'semester.semester_number',
            'label' => 'Семестр №',
        ),
        array(
            'name' => 'lectures',
            'label' => 'Лекції'
        ),
        array(
            'name' => 'labs',
            'label' => 'Лабораторні'
        ),
        array(
            'name' => 'practs',
            'label' => 'Практичні'
        ),
        array(
            'name' => 'selfwork',
            'label' => 'Самостійна робота студентів'
        ),
        array(
            'name' => 'hours_per_week',
            'label' => 'Годин на тиждень'
        ),
        array(
            'value' => $model->test ? 'Так' : 'Ні',
            'label' => 'Залік',
        ),
        array(
            'value' => $model->exam ? 'Так' : 'Ні',
            'label' => 'Екзамен',
        ),
        array(
            'value' => $model->course_work ? 'Так' : 'Ні',
            'label' => 'Курсова робота',
        ),
        array(
            'value' => $model->course_project ? 'Так' : 'Ні',
            'label' => 'Курсовий проект',
        ),
    ),
));
?>