<?php
/**
 *
 * @var GroupController $this
 * @var \CActiveDataProvider $provider
 * @var array $columns
 */
?>
<?php
$this->breadcrumbs = array(
    Yii::t('group', 'Groups'),
);
?>
<header>
    <?php $this->widget(
        Booster::BUTTON_GROUP,
        array(
            'buttons' => array(
                array(
                    'type'=> Booster::TYPE_PRIMARY,
                    'label' => Yii::t('group', 'Create new group'),
                    'url' => $this->createUrl('create'),
                ),
            ),
        )
    )
    ?>
</header>
<?php $this->renderPartial('//tableList',
    array(
        'provider' => $provider,
        'columns' => $columns,
    )
);
?>