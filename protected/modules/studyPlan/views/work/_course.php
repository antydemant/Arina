<?php
/**
 * @var WorkController $this
 * @var TbActiveForm $form
 * @var integer $course
 * @var WorkPlan $model
 */
?>

<?php $this->widget(BoosterHelper::GRID_VIEW, array(
        'dataProvider' => $model->getPlanSubjectProvider($course),
        'columns' => array(
            'subject.title'
        )
    ));