<?php
/**
 * @var WorkController $this
 * @var WorkSubject $model
 * @var TbActiveForm $form
 */
?>
<div>
    <?php $form = $this->beginWidget(BoosterHelper::FORM, array('id' => 'add_subject', 'htmlOptions' => array('class' => 'well'))); ?>
    <h2>Додання предмету</h2>
    <?php echo CHtml::label('Цикл', 'cycle'); ?>
    <?php echo CHtml::dropDownList('cycle', '', SubjectCycle::getList()); ?>
    <?php echo $form->dropDownListRow($model, 'subject_id', Subject::getList()); ?>
    <?php echo $form->dropDownListRow($model, 'cyclic_commission_id', CyclicCommission::getList()); ?>
    <?php echo $form->textFieldRow($model,'atestat_name'); ?>
    <?php echo $form->textFieldRow($model,'diploma_name'); ?>

    <div>
        1-й семестр
        <?php echo $form->numberField($model, 'total[0]', array('placeholder'=>'Загальна кількість')); ?>
        <?php echo $form->numberField($model, 'lectures[0]', array('placeholder'=>'Лекції')); ?>
        <?php echo $form->numberField($model, 'labs[0]', array('placeholder'=>'Лабораторні')); ?>
        <?php echo $form->numberField($model, 'practs[0]', array('placeholder'=>'Практичні')); ?>
        <?php echo $form->numberField($model, 'weeks[0]', array('placeholder'=>'Годин на тиждень')); ?>
        <?php echo $form->checkBoxRow($model, 'control[0][0]',array(), array('label'=>'Залік')); ?>
        <?php echo $form->checkBoxRow($model, 'control[0][1]',array(), array('label'=>'Екзамен')); ?>
        <?php echo $form->checkBoxRow($model, 'control[0][2]',array(), array('label'=>'ДПА')); ?>
        <?php echo $form->checkBoxRow($model, 'control[0][3]',array(), array('label'=>'ДА')); ?>
        <?php echo $form->checkBoxRow($model, 'control[0][4]',array(), array('label'=>'Курсова робота')); ?>
        <?php echo $form->checkBoxRow($model, 'control[0][5]',array(), array('label'=>'Курсовий проект')); ?>
    </div>
    <div>
        2-й семестр
        <?php echo $form->numberField($model, 'total[1]', array('placeholder'=>'Загальна кількість')); ?>
        <?php echo $form->numberField($model, 'lectures[1]', array('placeholder'=>'Лекції')); ?>
        <?php echo $form->numberField($model, 'labs[1]', array('placeholder'=>'Лабораторні')); ?>
        <?php echo $form->numberField($model, 'practs[1]', array('placeholder'=>'Практичні')); ?>
        <?php echo $form->numberField($model, 'weeks[1]', array('placeholder'=>'Годин на тиждень')); ?>
        <?php echo $form->checkBoxRow($model, 'control[1][0]',array(), array('label'=>'Залік')); ?>
        <?php echo $form->checkBoxRow($model, 'control[1][1]',array(), array('label'=>'Екзамен')); ?>
        <?php echo $form->checkBoxRow($model, 'control[1][2]',array(), array('label'=>'ДПА')); ?>
        <?php echo $form->checkBoxRow($model, 'control[1][3]',array(), array('label'=>'ДА')); ?>
        <?php echo $form->checkBoxRow($model, 'control[1][4]',array(), array('label'=>'Курсова робота')); ?>
        <?php echo $form->checkBoxRow($model, 'control[1][5]',array(), array('label'=>'Курсовий проект')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>