<?php
/**
 * @var $model Audience
 * @var $this AudienceController
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Audiences') => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);
?>

    <h1>Update Audience <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>