<?php
/**
 *
 * @var TeacherController $this
 * @var \CActiveDataProvider $provider
 * @var array $columns
 */
?>
<?php
$this->breadcrumbs = array(
    Yii::t('teacher', 'Teachers'),
);
?>
    <header>
        <?php $this->widget(
            Booster::BUTTON_GROUP,
            array(
                'buttons' => array(
                    array(
                        'type' => 'primary',
                        'label' => Yii::t('teacher', 'Add new teacher'),
                        'url' => $this->createUrl('teacher/create'),
                    ),
                ),
            )
        )
        ?>
    </header>
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

    <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
            &lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>

<?php echo CHtml::link(Yii::t('base', 'Advanced Search'), '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => new Teacher(),
        )); ?>
    </div>
<?php
$columns = array(
    'id',
    array(
        'name' => 'fullName',
        'value' => '$data->getFullName()',
        'htmlOptions' => array(//  'width' => '420px',
        )
    ),
    array(
        'name' => 'cyclic_commission_id',
        'value' => '$data->cyclicCommission->title',
        'htmlOptions' => array(// 'width' => '420px',
        )
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
    )
);