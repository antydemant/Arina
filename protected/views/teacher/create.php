<?php
/**
 *
 * @var TeacherController $this
 * @var \Teacher $model
 */
?><?php
$this->breadcrumbs = array(
    Yii::t('teacher', 'Teacher list') => array('teacher/index'),
    Yii::t('teacher', 'Sign up new teacher'),
);
?>
<header>
    <h2><?php echo Yii::t('teacher', "Sign up new teacher"); ?></h2>
    <hr>
    <?php
    $this->widget(
        Booster::BUTTON_GROUP,
        array(
            'buttons' => array(
                array(
                    'label' => Yii::t('teacher', 'Teacher list'),
                    'url' => $this->createUrl('teacher/index'),
                ),
            ),
        )
    );
    ?>
</header>
<?php $this->renderPartial('_form', array('model' => $model)); ?>