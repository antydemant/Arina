<?php
/**
 *
 * @var SubjectController $this
 * @var null|integer $id
 */
?>
<?php $this->widget(BoosterHelper::GRID_VIEW, array(
    'responsiveTable' => true,
    'template' => '{items}',
    'id' => 'subject-relations',
    'type' => 'striped condensed bordered hover',
    'dataProvider' => SubjectRelation::getProviderById($id),
    'columns' => array(
        array(
            'name' => 'speciality',
            'header' => Yii::t('base', 'Speciality'),
        ),
        array(
            'name' => 'cycle',
            'header' => Yii::t('base', 'Cycles'),
        ),
        array(
            'header' => Yii::t('base', 'Actions'),
            'type' => 'raw',
            'value' => 'CHtml::link("<i class=\"icon-trash\"></i>",Yii::app()->controller->createUrl("subject/removeRelation",$data["link"]),' .
                'array("data-original-title"=>Yii::t(\'base\',\'Remove\'), "data-toggle"=>"tooltip", "class"=>"remove-btn") )',
        ),
    ),
)); ?>

<script>
    $(function () {
        $('.remove-btn').click(function () {
            event.preventDefault();
            var link = $(this).attr('href');
            $.ajax(
                {
                    url: link,
                    success: function (html) {
                        jQuery("#subject-relations").replaceWith(html)
                    }
                });
        });
    });
</script>