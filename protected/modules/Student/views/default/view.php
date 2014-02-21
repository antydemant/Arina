<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs = array(
    Yii::t("student", "Students") => array('index'),
    $model->id,
);

$this->widget(
    Booster::BUTTON_GROUP,
    array(
        'buttons' => array(
            array(
                'type' => Booster::TYPE_PRIMARY,
                'label' => Yii::t('student', 'Students list'),
                'url' => $this->createUrl('index'),
            ),
            array(
                'type' => Booster::TYPE_PRIMARY,
                'label' => Yii::t('student', 'Create Student'),
                'url' => $this->createUrl('create'),
            ),
            array(
                'type' => Booster::TYPE_PRIMARY,
                'label' => Yii::t('student', 'Update Student'),
                'url' => $this->createUrl('update', array('id' => $model->id)),
            ),
            array(
                'type' => Booster::TYPE_PRIMARY,
                'label' => Yii::t('student', 'Delete Student'),
                'url' => $this->createUrl('delete'),
                'icon' => 'icon-remove-sign',

                "htmlOptions" => array(
                    "submit" => array(
                        'delete',
                        'id' => $model->id,
                    ),
                    "confirm" => Yii::t('student', "Do you want to delete this item?"),
                ),
            ),
        ),
    )
);

?>

<h1><?php echo Yii::t("student", "View Student") . ' ' . $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'code',
        'last_name',
        'first_name',
        'middle_name',
        'group_id',
        'phone_number',
        'mobile_number',
        'mother_name',
        'father_name',
        'gender',
        'address',
        'characteristics',
    ),
)); ?>
