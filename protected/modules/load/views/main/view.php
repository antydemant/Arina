<?php
/**
 * @var MainController $this
 * @var StudyYear $year
 * @var CActiveDataProvider $dataProvider
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Load') => $this->createUrl('index'),
    $year->title
);
?>
<div class="well">
<h2>Навантаження на <?php echo $year->title; ?> навчальний рік</h2>
<?php echo CHtml::beginForm(); ?>
<div>
    <?php echo TbHtml::label('Циклова комісія', 'cycle_id'); ?>
    <?php echo TbHtml::dropDownList('cycle_id', '', CyclicCommission::getList(), array(
        'class' => 'span6',
        'empty' => '',
        'ajax' => array(
            'type' => 'GET',
            'url' => $this->createUrl('/teacher/listByCycle'), //url to call.
            'update' => '#teacher_id',
            'data' => array('id' => 'js:this.value'),
        ))); ?>
    <?php echo TbHtml::label('Викладач', 'teacher_id'); ?>
    <?php echo TbHtml::dropDownList('teacher_id', '', array(), array('class' => 'span6')); ?>
    <br/>
    <?php echo TbHtml::submitButton('Фільтрувати'); ?>
</div>
<?php echo CHtml::endForm(); ?>
<hr/>
<div class="tab-content">
<table class="table table-bordered">
<tr>
    <th rowspan="4">Предмет</th>
    <th rowspan="4">Курс</th>
    <th rowspan="4">Група</th>
    <th rowspan="2" colspan="3">Кількість студентів</th>
    <th colspan="37">Кількість годин</th>
</tr>
<tr>
    <th colspan="4">за навчальним планом</th>
    <th colspan="15">Осінній семестр</th>
    <th colspan="15">Весняний семестр</th>
    <th colspan="3">за рік</th>
</tr>
<tr>
    <th rowspan="2">Всього</th>
    <th colspan="2">з них</th>
    <th rowspan="2">Кількість кредитів ECTS</th>
    <th rowspan="2">Всього</th>
    <th rowspan="2">Аудиторних</th>
    <th rowspan="2">СРС</th>

    <th rowspan="2">всього</th>
    <th rowspan="2">самостійна робота</th>
    <th colspan="4">з них аудиторних</th>
    <th colspan="3">курсові роботи, проекти</th>
    <th rowspan="2">розрах. та контр. роб.</th>
    <th rowspan="2">Керівництво практикою, дипломне нормоконтроль, ДКК</th>
    <th rowspan="2">Консультації</th>
    <th colspan="2">Форми контролю</th>
    <th rowspan="2">Всього за осінній семестр</th>

    <th rowspan="2">всього</th>
    <th rowspan="2">самостійна робота</th>
    <th colspan="4">з них аудиторних</th>
    <th colspan="3">курсові роботи, проекти</th>
    <th rowspan="2">розрах. та контр. роб.</th>
    <th rowspan="2">Керівництво практикою, дипломне нормоконтроль, ДКК</th>
    <th rowspan="2">Консультації</th>
    <th colspan="2">Форми контролю</th>
    <th rowspan="2">Всього за весняний семестр</th>

    <th rowspan="2">Всього</th>
    <th rowspan="2">Бюджет</th>
    <th rowspan="2">Контракт</th>
</tr>
<tr>
    <th>Бюджет</th>
    <th>Контракт</th>
    <th>всього</th>
    <th>лекції</th>
    <th>лабораторні</th>
    <th>практичні</th>
    <th>Проектування</th>
    <th>Перевірка</th>
    <th>Захист</th>
    <th>екзамен, ДПА</th>
    <th>залік</th>

    <th>всього</th>
    <th>лекції</th>
    <th>лабораторні</th>
    <th>практичні</th>
    <th>Проектування</th>
    <th>Перевірка</th>
    <th>Захист</th>
    <th>екзамен, ДПА</th>
    <th>залік</th>
</tr>

<?php
$fall = array();
$fall['total'] = 0;
$fall['selfwork'] = 0;
$fall['classes'] = 0;
$fall['lectures'] = 0;
$fall['labs'] = 0;
$fall['practs'] = 0;
$fall['pay'] = 0;

$spring = array();
$spring['total'] = 0;
$spring['selfwork'] = 0;
$spring['classes'] = 0;
$spring['lectures'] = 0;
$spring['labs'] = 0;
$spring['practs'] = 0;
$spring['pay'] = 0;

$totals = array();
$totals['total'] = 0;
$totals['budget'] = 0;
$totals['contract'] = 0;
?>

<?php foreach ($dataProvider->getData() as $data): ?>
    <tr>
        <td><?php echo $data->planSubject->subject->title; ?></td>
        <td><?php echo $data->course; ?></td>
        <td><?php echo $data->group->title; ?></td>
        <td>Студентів всього</td>
        <td>Студентів бюджет</td>
        <td>Студентів контракт</td>
        <td>Кредитів ECTS</td>
        <td>З плану всього</td>
        <td>З плану аудиторних</td>
        <td>З плану СРС</td>
        <td>
            <?php $total = $data->planSubject->total[$data->course * 2 - 1];
            $fall['total'] += $total;
            echo $total; ?>
        </td>
        <td>
            <?php
            $selfwork = $data->planSubject->getSelfwork($data->course * 2 - 1);
            $fall['selfwork'] += $selfwork;
            echo $selfwork;
            ?>
        </td>
        <td>
            <?php
            $classes = $data->planSubject->getClasses($data->course * 2 - 1);
            $fall['classes'] += $classes;
            echo $classes;
            ?>
        </td>
        <td>
            <?php
            $lectures = $data->planSubject->lectures[$data->course * 2 - 1];
            $fall['lectures'] += $lectures;
            echo $lectures;
            ?>
        </td>
        <td>
            <?php
            $labs = $data->planSubject->labs[$data->course * 2 - 1];
            $fall['labs'] += $labs;
            echo $labs;
            ?>
        </td>
        <td>
            <?php
            $practs = $data->planSubject->practs[$data->course * 2 - 1];
            $fall['practs'] += $practs;
            echo $practs;
            ?>
        </td>
        <td>Проектування</td>
        <td>Перевірка</td>
        <td>Захист</td>
        <td>контр. роб.</td>
        <td>ДКК</td>
        <td>Консультації</td>
        <td>екзамен, ДПА</td>
        <td>залік</td>
        <td>Всього до оплати</td>

        <td>
            <?php
            $total = $data->planSubject->total[$data->course * 2];
            $spring['total'] += $total;
            echo $total;?>
        </td>
        <td>
            <?php
            $selfwork = $data->planSubject->getSelfwork($data->course * 2);
            $spring['selfwork'] += $selfwork;
            echo $selfwork;
            ?>
        </td>
        <td>
            <?php
            $classes = $data->planSubject->getClasses($data->course * 2);
            $spring['classes'] += $classes;
            echo $classes;
            ?>
        </td>
        <td>
            <?php
            $lectures = $data->planSubject->lectures[$data->course * 2];
            $spring['lectures'] += $lectures;
            echo $lectures;
            ?>
        </td>
        <td>
            <?php
            $labs = $data->planSubject->labs[$data->course * 2];
            $spring['labs'] += $labs;
            echo $labs;
            ?>
        </td>
        <td>
            <?php
            $practs = $data->planSubject->practs[$data->course * 2];
            $spring['practs'] += $practs;
            ?>
        </td>
        <td>Проектування</td>
        <td>Перевірка</td>
        <td>Захист</td>
        <td>контр. роб.</td>
        <td>ДКК</td>
        <td>Консультації</td>
        <td>екзамен, ДПА</td>
        <td>залік</td>
        <td>Всього до оплати</td>

        <td>Всього</td>
        <td>Бюджет</td>
        <td>Контракт</td>
    </tr>
<?php endforeach; ?>
<tr>
    <td colspan="10">Всього</td>
    <td><?php echo $fall['total']; ?></td>
    <td><?php echo $fall['selfwork']; ?></td>
    <td><?php echo $fall['classes']; ?></td>
    <td><?php echo $fall['lectures']; ?></td>
    <td><?php echo $fall['labs']; ?></td>
    <td><?php echo $fall['practs']; ?></td>
    <td>a</td>
    <td>b</td>
    <td>c</td>
    <td>d</td>
    <td colspan="4">empty</td>
    <td><?php echo $fall['pay']; ?></td>
    <td><?php echo $spring['total']; ?></td>
    <td><?php echo $spring['selfwork']; ?></td>
    <td><?php echo $spring['classes']; ?></td>
    <td><?php echo $spring['lectures']; ?></td>
    <td><?php echo $spring['labs']; ?></td>
    <td><?php echo $spring['practs']; ?></td>
    <td><?php echo $spring['pay']; ?></td>
    <td colspan="9"></td>

    <td><?php echo $totals['total']; ?></td>
    <td><?php echo $totals['budget']; ?></td>
    <td><?php echo $totals['contract']; ?></td>
</tr>
</table>
</div>

</div>
