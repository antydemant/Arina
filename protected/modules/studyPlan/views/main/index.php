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
        'type' => 'primary',
    ),
    array(
        'label' => 'Переглянути навчальні плани',
        'url' => $this->createUrl('plan/index'),
        'type' => 'info',
    ),
    array(
        'label' => 'Створити робочий план',
        'url' => $this->createUrl('work/create'),
        'type' => 'primary',
    ),
    array(
        'label' => 'Переглянути робочі навчальні плани',
        'url' => $this->createUrl('work/index'),
        'type' => 'info',
    ),


);
?>

