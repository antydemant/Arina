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

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
));
?>