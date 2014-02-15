<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 15.02.14
 * Time: 10:10
 * @var $this SubjectController
 * @var $model SpSubject
 */
$this->breadcrumbs = array(
    'Навчальні плани' => $this->createUrl('plan/index'),
    'Предмети' => $this->createUrl('index'),
    $model->subject->title
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>