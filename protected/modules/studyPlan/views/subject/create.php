<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 15.02.14
 * Time: 10:10
 * @var $this SubjectController
 * @var $model Subject
 */
$this->breadcrumbs = array(
    'Навчальні плани' => $this->createUrl('plan/index'),
    'Предмети' => $this->createUrl('index'),
    'Новий предмет'
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>