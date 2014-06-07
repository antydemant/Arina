<?php
/**
 * @var $cycle_id integer
 * @var $teacher_id integer
 */
?>
<div>
    <?php echo TbHtml::dropDownList('cycle_id', $cycle_id, CyclicCommission::getList(), array(
        'class' => 'span6',
        'empty' => '',
        'ajax' => array(
            'type' => 'GET',
            'url' => $this->createUrl('/teacher/listByCycle'), //url to call.
            'update' => '#teacher_id',
            'data' => array('id' => 'js:this.value'),
        ))); ?>
    <?php echo TbHtml::dropDownList('teacher_id', $teacher_id, Teacher::getListByCycle($cycle_id), array('class' => 'span6')); ?>
</div>