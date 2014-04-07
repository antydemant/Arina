<?php
$this->breadcrumbs = array(
    Yii::t('base', 'Subjects') => array('index'),
    $model->title => array('view', 'id' => $model->id),
    Yii::t('base', 'Updating'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Subject list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),

    array('label' => Yii::t('subject', 'Create subject'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),

    array(
        'label' => Yii::t('subject', 'Delete subject'),
        'icon' => 'trash',
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
<h2><?php echo Yii::t('base', 'Updating'); ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>