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
                        'label' => Yii::t('teacher', 'Add new teacher'),
                        'url' => $this->createUrl('teacher/create'),
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