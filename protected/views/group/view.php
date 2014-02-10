<?php
/**
 *
 * @var GroupController $this
 * @var array|\CActiveRecord|mixed|null $model
 */

$this->breadcrumbs = array(
    Yii::t('group', 'Groups') => array('index'),
    $model->title,
);
?>

    <header>
        <?php $this->widget(
            Booster::BUTTON_GROUP,
            array(
                'buttons' => array(
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => Yii::t('student', 'Students list'),
                        'icon' => 'icon-list',
                        'url' => Yii::app()->createUrl("student/group", array("id"=>$model->id)),
                    ),
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => Yii::t('group', 'Create new group'),
                        'url' => $this->createUrl('create'),
                        'icon' => 'icon-plus-sign',
                    ),
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => Yii::t('group', 'Delete group'),
                        'url' => $this->createUrl('delete'),
                        'icon' => 'icon-remove-sign',

                        "htmlOptions"=> array(
                            "submit"=>array(
                                'delete',
                                'id'=>$model->id,
                            ),
                            "confirm"=>Yii::t('group', "Do you want to delete this item?"),
                        ),
                    ),
                ),
            )
        );
        ?>
    </header>

    <h1><?php echo Yii::t('', '') . $model->title; ?></h1>

<?php $this->widget(Booster::DETAIL_VIEW, array(
    'data' => $model,
    'attributes' => array(
        'title',
        array('value' => $model->curator->fullName, 'name' => 'curator_id'),
    ),
));
?>