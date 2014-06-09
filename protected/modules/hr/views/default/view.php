<?php
/* @var $this DefaultController */
/* @var $model Employee */

$this->breadcrumbs = array(
    Yii::t('employee', 'Employees') => array('index'),
    $model->id,
);

$this->widget(
    BoosterHelper::BUTTON_GROUP,
    array(
        'buttons' => array(
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('employee', 'Employees list'),
                'url' => $this->createUrl('index'),
            ),
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('employee', 'Create an employee'),
                'url' => $this->createUrl('create'),
            ),
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('employee', 'Update employee'),
                'url' => $this->createUrl('update', array('id' => $model->id)),
            ),
            array(
                'type' => BoosterHelper::TYPE_PRIMARY,
                'label' => Yii::t('employee', 'Delete employee'),
                'url' => $this->createUrl('delete'),
                'icon' => 'icon-remove-sign',

                "htmlOptions" => array(
                    "submit" => array(
                        'delete',
                        'id' => $model->id,
                    ),
                    "confirm" => Yii::t("student", "Do you want to delete this item?"),
                ),
            ),
        ),
    )
);

?>

<h1><?php echo Yii::t('employee', 'View employee') . ' ' . $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'fullName',
        array(
            'name' => 'birth_date',
            'value' => Yii::app()->getDateFormatter()->format('dd MMM y', $model->birth_date)
        ),

    ),
)); ?>
