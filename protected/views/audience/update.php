<?php
/**
 * @var $model Audience
 * @var $this AudienceController
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Audiences') => array('index'),
    Yii::t('audience', 'Update audience') . " {$model->number}",
);
?>

    <h1><?php echo Yii::t('audience', 'Update audience') . " {$model->number}"; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>