<?php
/**
 * @var $this SemesterController
 * @var $model Semester
 */
$this->breadcrumbs = array(
    'Навчальні плани' => '',
    'Семестри' => $this->createUrl('index'),
    'Новий семестр'
);
?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>