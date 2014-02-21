<?php
/* @var $this ActualClassController */
/* @var $data ActualClass */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
    <?php echo CHtml::encode($data->date); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('class_number')); ?>:</b>
    <?php echo CHtml::encode($data->class_number); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('teacher_load_id')); ?>:</b>
    <?php echo CHtml::encode($data->teacher_load_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('class_type')); ?>:</b>
    <?php echo CHtml::encode($data->class_type); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
    <?php echo CHtml::encode($data->group_id); ?>
    <br/>


</div>