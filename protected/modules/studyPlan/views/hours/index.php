<?php
/**
 * @var HoursController $this
 * @var \CActiveDataProvider $dataProvider
 */
$this->breadcrumbs = array(
    Yii::t('base', 'StudyPlan') => $this->createUrl('plan/index'),
    'Семестри'
);
?>
    <header>
        <?php $this->widget(
            Booster::BUTTON_GROUP,
            array(
                'buttons' => array(
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => 'Додати семестр',
                        'url' => $this->createUrl('create'),
                    ),
                ),
            )
        )
        ?>
    </header>
<?php
$this->widget(
    Booster::GRID_VIEW,
    array(
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'responsiveTable' => true,
        'type' => 'striped condensed bordered hover',
    )
);
?>