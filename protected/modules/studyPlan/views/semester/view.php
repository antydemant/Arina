<?php
/**
 * @var $this SemesterController
 * @var $model Semester
 */
$this->breadcrumbs = array(
    Yii::t('base', 'StudyPlan') => $this->createUrl('plan/index'),
    'Семестри' => $this->createUrl('index'),
    "# $model->semester_number"
);
?>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => 'Спеціальність',
            'name' => 'plan.speciality.title',
        ),
        array(
            'name' => 'plan.study_year',
            'label' => 'Навчальний рік',
        ),
        array(
            'name' => 'semester_number',
            'label' => 'Номер семестру'
        ),
        array(
            'name' => 'weeks_count',
            'label' => 'Кількість тижнів'
        ),
    ),
));
?>