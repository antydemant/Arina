<?php
/**
 *
 * @var StudentController $this
 * @var \CActiveDataProvider $provider
 * @var string $groupName
 * @var Group $group
 */
?>
<?php
$this->breadcrumbs = array(
    Yii::t('student', "Students") => array('index'),
    Yii::t('student', "Students of group") . " $groupName",
);
?>
    <header>
        <?php echo Yii::t('student','Students list') . ': '. $group->getStudentsCount();?>
        <br>
        <?php echo Yii::t('student','Budget students count') . ': '. $group->getBudgetStudentsCount();?>
        <br>
        <?php echo Yii::t('student','Contract students count') . ': '. $group->getContractStudentsCount();?>
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