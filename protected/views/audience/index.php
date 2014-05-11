<?php
/**
 * @var $this AudienceController
 * @var $dataProvider CActiveDataProvider
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Audiences'),
);
$this->menu = array(
    array(
        'type' => BoosterHelper::TYPE_PRIMARY,
        'label' => Yii::t('audience', 'Add new audience'),
        'url' => $this->createUrl('create'),
    ),
);
?>

<?php
$columns = array(
    'number',
    'typeName',
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{delete}{update}',
        'header' => Yii::t('base', 'Actions'),
    ),
);
$this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns,));
?>
