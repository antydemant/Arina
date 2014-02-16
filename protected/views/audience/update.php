<?php
/**
 * @var $model Audience
 * @var $this AudienceController
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Audiences') => array('index'),
    Yii::t('audience', 'Update audience') . " {$model->number}",
);
$this->menu =array(
    array('type' => Booster::TYPE_PRIMARY, 'label' => Yii::t('audience', 'Audience list'), 'url' => array('index')),

    array(
        'label' => Yii::t('audience', 'Delete audience'),
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
<h2><?php echo Yii::t('audience', 'Update audience') . " {$model->number}"; ?></h2>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>