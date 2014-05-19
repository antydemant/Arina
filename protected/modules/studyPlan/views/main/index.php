<?php
/**
 * @var MainController $this
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans'),
);

$this->menu = array(
    array(
        'label' => 'Створити навчальний план',
        'url' => $this->createUrl('plan/create'),
    ),
    array(
        'label' => 'Переглянути навчальні плани',
        'url' => $this->createUrl('plan/index'),
    ),
    array(
        'label' => 'Створити робочий план',
        'url' => $this->createUrl('work/create')
    ),
    array(
        'label' => 'Переглянути робочі навчальні плани',
        'url' => $this->createUrl('work/index'),
    ),


);
?>

