<?php
/**
 *
 * @var GroupController $this
 * @var \CActiveDataProvider $provider
 * @var array $columns
 */
?>
<header>
    <?php $this->widget(
        Booster::BUTTON_GROUP,
        array(
            'buttons' => array(
                array(
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