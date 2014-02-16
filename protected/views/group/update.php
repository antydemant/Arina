<?php
/**
 *
 * @var GroupController $this
 * @var Group $model
 */

$this->breadcrumbs = array(
    Yii::t('group', 'Groups') => array('index'),
    Yii::t('group', 'Update group') . " {$model->title}",
);
$this->menu = array(
    array(
        'type' => Booster::TYPE_PRIMARY,
        'label' => Yii::t('group', 'Groups list'),
        'url' => $this->createUrl('index'),
    ),
    array(
        'type' => Booster::TYPE_PRIMARY,
        'label' => Yii::t('group', 'Create new group'),
        'url' => $this->createUrl('view', array('id' => $model->id)),
    ),
    array(
        'label' => Yii::t('student', 'Students of group'),
        'icon'=>'list',
        'url' => Yii::app()->createUrl('student/group', array('id' => $model->id)),
    ),
    array(
        'label' => Yii::t('group', 'Delete group'),
        'url' => $this->createUrl('delete', array('id' => $model->id)),
        'icon'=>'trash',
        'htmlOptions' => array(
            'submit' => array(
                'delete',
                'id' => $model->id,
            ),
            'confirm' => Yii::t('base', 'Do you want to delete this item?'),
        ),
    ),
);
?>
    <h2><?php echo Yii::t('group', 'Update group') . " {$model->title}"; ?></h2>
<?php
$this->renderPartial('_form', array('model' => $model));
?>