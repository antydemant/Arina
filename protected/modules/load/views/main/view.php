<?php
/**
 * @var MainController $this
 * @var StudyYear $year
 * @var CActiveDataProvider $dataProvider
 * @var Load $model
 * @var TbActiveForm $form
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Load') => $this->createUrl('index'),
    $year->title
);

$this->menu = array(
    array(
        'label' => 'Генерувати навантаження',
        'url' => $this->createUrl('generate', array('id' => $year->id)),
        'type' => 'primary',
    )
);
?>
<div class="well">
<h2>Навантаження на <?php echo $year->title; ?> навчальний рік</h2>

<?php $form = $this->beginWidget(BoosterHelper::FORM, array('id' => 'load-filter-form', 'method' => 'GET')); ?>
<?php echo $form->dropDownListRow(
    $model,
    'commissionId',
    CyclicCommission::getList(),
    array(
        'class' => 'span6',
        'empty' => '',
        'ajax' => array(
            'type' => 'GET',
            'url' => $this->createUrl('/teacher/listByCycle'), //url to call.
            'update' => '#Load_teacher_id',
            'data' => array('id' => 'js:this.value'),
        )
    )
); ?>
<?php echo $form->dropDownListRow($model, 'teacher_id', array(), array('empty' => '', 'class' => 'span6')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton('Фільтрувати', array('class'=>'btn-success')); ?>
    <?php echo TbHtml::link(
        'Скасувати фільтр',
        $this->createUrl('view', array('id' => $year->id)),
        array('class' => 'btn btn-danger')
    ); ?>
</div>
<?php $this->endWidget(); ?>
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
$fall['consult'] = 0;
$fall['exam'] = 0;
$fall['test'] = 0;
$fall['pay'] = 0;

$spring = array();
$spring['total'] = 0;
$spring['selfwork'] = 0;
$spring['classes'] = 0;
$spring['lectures'] = 0;
$spring['labs'] = 0;
$spring['practs'] = 0;
$spring['consult'] = 0;
$spring['exam'] = 0;
$spring['test'] = 0;
$spring['pay'] = 0;

$totals = array();
$totals['total'] = 0;
$totals['budget'] = 0;
$totals['contract'] = 0;
?>

<?php
/** @var Load $data */
foreach ($dataProvider->getData() as $data):
    $springSemester = $data->course * 2;
    $fallSemester = $springSemester - 1;
    ?>
    <tr>
        <td><?php echo $data->planSubject->subject->title; ?></td>
        <td><?php echo $data->course; ?></td>
        <td><?php echo $data->group->title; ?></td>
        <td><?php echo $data->getStudentsCount(); ?></td>
        <td><?php echo $data->getBudgetStudentsCount(); ?></td>
        <td><?php echo $data->getContractStudentsCount(); ?></td>
        <td>Кредитів ECTS</td>
        <td>З плану всього</td>
        <td>З плану аудиторних</td>
        <td>З плану СРС</td>
        <td>
            <?php $total = $data->planSubject->total[$fallSemester];
            $fall['total'] += $total;
            echo $total; ?>
        </td>
        <td>
            <?php
            $selfwork = $data->planSubject->getSelfwork($fallSemester);
            $fall['selfwork'] += $selfwork;
            echo $selfwork;
            ?>
        </td>
        <td>
            <?php
            $classes = $data->planSubject->getClasses($fallSemester);
            $fall['classes'] += $classes;
            echo $classes;
            ?>
        </td>
        <td>
            <?php
            $lectures = $data->getLectures($fallSemester);
            $fall['lectures'] += intval($lectures);
            echo $lectures;
            ?>
        </td>
        <td>
            <?php
            $labs = $data->getPracts($fallSemester);
            $fall['labs'] += intval($labs);
            echo $labs;
            ?>
        </td>
        <td>
            <?php
            $practs = $data->planSubject->practs[$fallSemester];
            $fall['practs'] += $practs;
            echo $practs;
            ?>
        </td>
        <td>Проектування</td>
        <td>Перевірка</td>
        <td>Захист</td>
        <td>контр. роб.</td>
        <td>ДКК</td>
        <td>
            <?php
            echo $data->consult[0];
            $fall['consult'] += $data->consult[0];
            ?>
        </td>
        <td>
            <?php
            echo $data->getExam($fallSemester);
            if ($data->hasExam($fallSemester)) {
                $fall['exam'] += $data->getExam($fallSemester);
            }
            ?>
        </td>
        <td>
            <?php
            if ($data->hasTest($fallSemester)) {
                echo $data->getTest($fallSemester);
                $fall['test'] += $data->getTest($fallSemester);
            }
            ?>
        </td>
        <td>
            <?php
            $pay_first = $classes + $data->consult[0] + $data->getExam($fallSemester) + $data->getTest($fallSemester);
            echo $pay_first;
            $fall['pay'] += $pay_first;
            ?>
        </td>

        <td>
            <?php
            $total = $data->planSubject->total[$springSemester];
            $spring['total'] += $total;
            echo $total;?>
        </td>
        <td>
            <?php
            $selfwork = $data->planSubject->getSelfwork($springSemester);
            $spring['selfwork'] += $selfwork;
            echo $selfwork;
            ?>
        </td>
        <td>
            <?php
            $classes = $data->planSubject->getClasses($springSemester);
            $spring['classes'] += $classes;
            echo $classes;
            ?>
        </td>
        <td>
            <?php
            $lectures = $data->getLectures($springSemester);
            $spring['lectures'] += intval($lectures);
            echo $lectures;
            ?>
        </td>
        <td>
            <?php
            $labs = $data->getLabs($springSemester);
            $spring['labs'] += intval($labs);
            echo $labs;
            ?>
        </td>
        <td>
            <?php
            $practs = $data->getPracts($springSemester);
            $spring['practs'] += intval($practs);
            ?>
        </td>
        <td>Проектування</td>
        <td>Перевірка</td>
        <td>Захист</td>
        <td>контр. роб.</td>
        <td>ДКК</td>
        <td>
            <?php
            echo $data->consult[1];
            $spring['consult'] += $data->consult[1];
            ?>
        </td>
        <td>
            <?php
            if ($data->hasExam($springSemester)) {
                echo $data->getExam($springSemester);
                $spring['exam'] += $data->getExam($springSemester);
            }
            ?>
        </td>
        <td>
            <?php
            if ($data->hasTest($springSemester)) {
                echo $data->getTest($springSemester);
                $spring['test'] += $data->getTest($springSemester);
            }
            ?>
        </td>
        <td>
            <?php
            $pay_second = $classes + $data->consult[1] + $data->getExam($springSemester) + $data->getTest(
                    $springSemester
                );
            echo $pay_second;
            $spring['pay'] += $pay_second;
            ?>
        </td>

        <td>
            <?php
            $all = $pay_first + $pay_second;
            echo $all;
            $totals['total'] += $all;
            ?>
        </td>
        <td>
            <?php
            $budget = round($all * $data->getBudgetPercent() / 100);
            echo $budget;
            $totals['budget'] += $budget;
            ?>
        </td>
        <td>
            <?php
            $contract = round($all * $data->getContractPercent() / 100);
            echo $contract;
            $totals['contract'] += $contract;
            ?>
        </td>
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
    <td>Проектування</td>
    <td>Перевірка</td>
    <td>Захист</td>
    <td>контр. роб.</td>
    <td>ДКК</td>
    <td><?php echo $fall['consult']; ?></td>
    <td><?php echo $fall['exam']; ?></td>
    <td><?php echo $fall['test']; ?></td>
    <td><?php echo $fall['pay']; ?></td>

    <td><?php echo $spring['total']; ?></td>
    <td><?php echo $spring['selfwork']; ?></td>
    <td><?php echo $spring['classes']; ?></td>
    <td><?php echo $spring['lectures']; ?></td>
    <td><?php echo $spring['labs']; ?></td>
    <td><?php echo $spring['practs']; ?></td>
    <td>Проектування</td>
    <td>Перевірка</td>
    <td>Захист</td>
    <td>контр. роб.</td>
    <td>ДКК</td>
    <td><?php echo $spring['consult']; ?></td>
    <td><?php echo $spring['exam']; ?></td>
    <td><?php echo $spring['test']; ?></td>
    <td><?php echo $spring['pay']; ?></td>

    <td><?php echo $totals['total']; ?></td>
    <td><?php echo $totals['budget']; ?></td>
    <td><?php echo $totals['contract']; ?></td>
</tr>
</table>
</div>

</div>
