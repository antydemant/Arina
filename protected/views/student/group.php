<?php
/**
 *
 * @var StudentController $this
 * @var \CActiveDataProvider $provider
 * @var string $groupName
 */
?>
<?php
$this->breadcrumbs = array(
    Yii::t('student', "Students") => array('index'),
    Yii::t('student', "Students of group") . " $groupName",
);
?>
    <header>

    </header>
<?php
$columns = array(
    'code',
    'last_name',
    'first_name',
    'middle_name',
);
?>
<?php $this->renderPartial('//tableList', array('provider' => $provider, 'columns' => $columns));