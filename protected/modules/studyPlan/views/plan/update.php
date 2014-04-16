<?php
/**
 * @var PlanController $this
 * @var StudyPlan $model
 */

?>

    <h3>Редагування</h3>
<?php $this->renderPartial('_form', array('model' => $model)); ?>


<?php
$semesterColumns = array();
for ($i = 0; $i < 8; $i++)
    $semesterColumns[] = array('header' => $i + 1, 'value' => '$data->weeks[' . $i . ']');
?>

<?php $this->widget(Booster::GRID_VIEW, array(
    'dataProvider' => $model->getPlanSubjectProvider(),
    'columns' => array_merge(
        array(
            array(
                'name' => 'subject_id',
                'value' => '$data->subject->title',
                'sortable' => true,
            ),
            array('name' => 'total'),
            array('name' => 'classes'),
            array('name' => 'lectures'),
            array('name' => 'labs'),
            array('name' => 'practs'),
            array('name' => 'selfwork')
        ),
        $semesterColumns),
));
?>