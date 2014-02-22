<?php
/* @var $model JournalViewer */
?>
<div id="journal-form">
    <?php
    $form = $this->beginWidget(Booster::FORM);
    echo $form->dropDownListRow($model, 'groupId', Group::getListAll('id', 'title'), array('empty' => 'Select group'));
    echo $form->dropDownListRow($model, 'subjectId', Subject::getListAll('id', 'title'), array('empty' => 'Select subject'));
    echo CHtml::ajaxSubmitButton(Yii::t('base', 'Show'), array('index'), array('replace' => '#journal-form'));
    $this->endWidget();
    ?>
    <?php if (!$model->isEmpty): ?>

        <?php $data = $model->getData(); ?>
        <div>

            <table class="table table-bordered">
                <caption>La-la-la</caption>
                <thead>
                <tr>
                    <th style="width: 100px">Студенти\Заняття:</th>
                    <?php foreach ($data['classes'] as $item): ?>
                        <th><?php echo $item->date; ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php /** @var $item Student */ ?>
                <?php foreach ($data['students'] as $item): ?>
                    <tr>
                        <td><?php echo $item->getFullName(); ?></td>
                        <?php foreach($item->classes as $class): ?>
                            <td><?php echo $class; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
</div>