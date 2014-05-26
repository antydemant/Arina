<?php
/**
 * @var WorkController $this
 * @var integer $course
 * @var WorkPlan $model
 */
switch ($course) {
    case 1:
        $fall = 0;
        $spring = 1;
        break;
    case 2:
        $fall = 2;
        $spring = 3;
        break;
    case 3:
        $fall = 4;
        $spring = 5;
        break;
    case 4:
        $fall = 6;
        $spring = 7;
        break;
    default:
        $fall = 0;
        $spring = 1;
}
?>
<table>
    <tr>
        <th rowspan="2" style="vertical-align: top">Предмет</th>
        <th colspan="8">Осінній семестр</th>
        <th colspan="8">Веснянний семестр</th>
    </tr>
    <tr>
        <th>Всього</th>
        <th>Аудиторних</th>
        <th>Лекції</th>
        <th>Практичні</th>
        <th>Лабораторні</th>
        <th>Самостійна робота</th>
        <th>Курсові роботи, проекти</th>
        <th>Кіл. год в тиж.</th>

        <th>Всього</th>
        <th>Аудиторних</th>
        <th>Лекції</th>
        <th>Практичні</th>
        <th>Лабораторні</th>
        <th>Самостійна робота</th>
        <th>Курсові роботи, проекти</th>
        <th>Кількість год в тиждень</th>
    </tr>
    <?php foreach ($model->subjects as $subject): ?>
        <?php if ($subject->presentIn($course)): ?>
            <tr>
                <td><?php echo $subject->subject->title; ?></td>

                <td><?php echo $subject->total[$fall]; ?></td>
                <td><?php echo $subject->getClasses($fall); ?></td>
                <td><?php echo $subject->lectures[$fall]; ?></td>
                <td><?php echo $subject->practs[$fall]; ?></td>
                <td><?php echo $subject->labs[$fall]; ?></td>
                <td><?php echo $subject->getSelfWork($fall); ?></td>
                <td>TBD</td>
                <td><?php echo $subject->weeks[$fall]; ?></td>

                <td><?php echo $subject->total[$spring]; ?></td>
                <td><?php echo $subject->getClasses($spring); ?></td>
                <td><?php echo $subject->lectures[$spring]; ?></td>
                <td><?php echo $subject->practs[$spring]; ?></td>
                <td><?php echo $subject->labs[$spring]; ?></td>
                <td><?php echo $subject->getSelfWork($spring); ?></td>
                <td>TBD</td>
                <td><?php echo $subject->weeks[$spring]; ?></td>

                <td><?php echo CHtml::link('редагувати', $this->createUrl('editSubject', array('id' => $subject->id))); ?>
                    <?php echo CHtml::link('видалити', $this->createUrl('deleteSubject', array('id' => $subject->id))) ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>