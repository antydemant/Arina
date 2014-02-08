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
?>
<header>
    <h2><?php echo Yii::t('group', 'Update group') . " {$model->title}"; ?></h2>
</header>
<?php
$this->renderPartial('_form', array('model' => $model));
?>