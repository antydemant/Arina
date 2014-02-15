<?php
/**
 * @var $this SemesterController
 * @var $model Semester
 */
$this->breadcrumbs = array(
    'Навчальні плани' => '',
    'Семестри' => $this->createUrl('index'),
    "# $model->semester_number",
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>