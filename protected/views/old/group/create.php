<?php
/**
 *
 * @var GroupController $this
 * @var \Group $model
 */

$this->breadcrumbs = array(
    Yii::t('group', 'Groups') => array('index'),
    Yii::t('group', 'New group creating'),
);
$this->menu = array(
    array(
        'type' => Booster::TYPE_PRIMARY,
        'label' => Yii::t('group', 'Groups list'),
        'url' => $this->createUrl('index'),
    ),
);
?>
    <h2><?php echo Yii::t('group', 'New group creating'); ?></h2>
<?php
$this->renderPartial('_form', array('model' => $model));
?>