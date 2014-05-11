<?php
/**
 * @var $this \SubjectController
 * @var $dataProvider CActiveDataProvider
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Subjects'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Create subject'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),
);
?>

<h2><?php echo Yii::t('subject', 'Subject list'); ?></h2>

<?php
$columns = array(
    'title',
    'code',
    'short_name',
    array(
        'header' => Yii::t('base', 'Actions'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{update}{delete}',
    ),
);
$this->renderPartial('//tableList', array('columns' => $columns, 'provider' => $dataProvider));
?>
