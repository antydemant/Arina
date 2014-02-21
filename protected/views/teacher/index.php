<?php
/**
 *
 * @var TeacherController $this
 * @var \CActiveDataProvider $provider
 * @var Teacher $model
 */
?>
<?php
$this->breadcrumbs = array(
    Yii::t('teacher', 'Teachers'),
);
$this->menu = array(
    array(
        'type' => 'primary',
        'label' => Yii::t('teacher', 'Add new teacher'),
        'url' => $this->createUrl('teacher/create'),
    ),
);
?>
<?php

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('teacher-grid', {
    data: $(this).serialize()
    });
    return false;
    });
    ");
?>

    <h2><?php echo Yii::t('teacher', 'Teacher list') ?></h2>

    <p>
        <?php
        echo Yii::t('base', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.')
        ?>
    </p>

<?php echo CHtml::link(Yii::t('base', 'Advanced Search'), '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
<?php
$columns = array(
    array(
        'name' => 'fullName',
        'value' => '$data->getFullName()',
    ),
    array(
        'name' => 'cyclic_commission_id',
        'value' => '$data->cyclicCommission->title',
        'htmlOptions' => array(),
        'filter' => CHtml::listData(CyclicCommission::model()->findAll(), 'id', 'title')
    ),
    array(
        'header' => Yii::t('base', 'Actions'),
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{update}{delete}{view}',
    )
);

$this->renderPartial('//tableList',
    array(
        'provider' => $provider,
        'columns' => $columns,
        'filter' => $model,
    )
);