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
    array(
        'header' => Yii::t('base', 'Actions'),
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{update}{view}',
    ),
);
?>
<?php $this->renderPartial('//tableList', array('provider' => $provider, 'columns' => $columns));