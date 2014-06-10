<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs = array(
    Yii::t("student", "Students") => array('index'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t("base", "Update"),
);

$this->widget(
    BoosterHelper::BUTTON_GROUP,
    array(
        'buttons' => array(
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('student', 'Students list'),
                'url' => $this->createUrl('index'),
            ),
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('student', 'Create Student'),
                'url' => $this->createUrl('create'),
            ),
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('student', 'View Student'),
                'url' => $this->createUrl('view', array('id' => $model->id)),
            ),
        ),
    )
);

?>

    <h1><?php echo $model->getFullName(); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>