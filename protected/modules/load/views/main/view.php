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
    ),
    array(
        'label' => 'Розподілити курсові роботи, проекти',
        'url' => $this->createUrl('project', array('id' => $year->id)),
        'type' => 'info'
    ),
);
Yii::app()->clientScript->registerScript(
    'load-buttons',
    '
       function toggleSection(section, sender) {
           $("."+section).toggle();
           $(sender).toggleClass("btn-info");
           $(sender).toggleClass("btn-warning");
       }
   ',
    CClientScript::POS_END
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
    <?php echo TbHtml::submitButton('Фільтрувати', array('class' => 'btn-success')); ?>
    <?php echo TbHtml::link(
        'Скасувати фільтр',
        $this->createUrl('view', array('id' => $year->id)),
        array('class' => 'btn btn-danger')
    ); ?>
</div>
<?php $this->endWidget(); ?>
<hr/>

<div class="form-actions">
    <button onclick="toggleSection('general', this)" class="btn btn-info">Загальні дані</button>
    <button onclick="toggleSection('fall', this)" class="btn btn-info">Осінній семестр</button>
    <button onclick="toggleSection('spring', this)" class="btn btn-info">Весняний семестр</button>
</div>

<div class="tab-content">
<table class="table table-bordered">
<tr>
    <th rowspan="4"></th>
    <th rowspan="4">Предмет</th>
    <th rowspan="4">Викладач</th>
    <th rowspan="4" class="general">Курс</th>
    <th rowspan="4">Група</th>
    <th rowspan="2" colspan="3" class="general">Кількість студентів</th>
    <th colspan="37">Кількість годин</th>
    <th rowspan="4"></th>
</tr>
<tr>
    <th colspan="4" class="general">за навчальним планом</th>
    <th colspan="15" class="fall">Осінній семестр</th>
    <th colspan="15" class="spring">Весняний семестр</th>
    <th colspan="3">за рік</th>
</tr>
<tr>
    <th rowspan="2" class="general">Всього</th>
    <th colspan="2" class="general">з них</th>
    <th rowspan="2" class="general">Кількість кредитів ECTS</th>
    <th rowspan="2" class="general">Всього</th>
    <th rowspan="2" class="general">Аудиторних</th>
    <th rowspan="2" class="general">СРС</th>

    <th rowspan="2" class="fall">всього</th>
    <th rowspan="2" class="fall">самостійна робота</th>
    <th colspan="4" class="fall">з них аудиторних</th>
    <th colspan="3" class="fall">курсові роботи, проекти</th>
    <th rowspan="2" class="fall">розрах. та контр. роб.</th>
    <th rowspan="2" class="fall">Керівництво практикою, дипломне нормоконтроль, ДКК</th>
    <th rowspan="2" class="fall">Консультації</th>
    <th colspan="2" class="fall">Форми контролю</th>
    <th rowspan="2" class="fall">Всього за осінній семестр</th>

    <th rowspan="2" class="spring">всього</th>
    <th rowspan="2" class="spring">самостійна робота</th>
    <th colspan="4" class="spring">з них аудиторних</th>
    <th colspan="3" class="spring">курсові роботи, проекти</th>
    <th rowspan="2" class="spring">розрах. та контр. роб.</th>
    <th rowspan="2" class="spring">Керівництво практикою, дипломне нормоконтроль, ДКК</th>
    <th rowspan="2" class="spring">Консультації</th>
    <th colspan="2" class="spring">Форми контролю</th>
    <th rowspan="2" class="spring">Всього за весняний семестр</th>

    <th rowspan="2">Всього</th>
    <th rowspan="2">Бюджет</th>
    <th rowspan="2">Контракт</th>
</tr>
<tr>
    <th class="general">Бюджет</th>
    <th class="general">Контракт</th>
    <th class="fall">всього</th>
    <th class="fall">лекції</th>
    <th class="fall">лабораторні</th>
    <th class="fall">практичні</th>
    <th class="fall">Проектування</th>
    <th class="fall">Перевірка</th>
    <th class="fall">Захист</th>
    <th class="fall">екзамен, ДПА</th>
    <th class="fall">залік</th>

    <th class="spring">всього</th>
    <th class="spring">лекції</th>
    <th class="spring">лабораторні</th>
    <th class="spring">практичні</th>
    <th class="spring">Проектування</th>
    <th class="spring">Перевірка</th>
    <th class="spring">Захист</th>
    <th class="spring">екзамен, ДПА</th>
    <th class="spring">залік</th>
</tr>

<?php
$fall = array();
$spring = array();
$fall['total'] = 0;
$spring['total'] = 0;
$fall['selfwork'] = 0;
$spring['selfwork'] = 0;
$fall['classes'] = 0;
$spring['classes'] = 0;
$fall['lectures'] = 0;
$spring['lectures'] = 0;
$fall['labs'] = 0;
$spring['labs'] = 0;
$fall['practs'] = 0;
$spring['practs'] = 0;
$fall['project'] = 0;
$spring['project'] = 0;
$fall['check'] = 0;
$spring['check'] = 0;
$fall['control'] = 0;
$spring['control'] = 0;
$fall['works'] = 0;
$spring['works'] = 0;
$fall['dkk'] = 0;
$spring['dkk'] = 0;
$fall['consult'] = 0;
$spring['consult'] = 0;
$fall['exam'] = 0;
$spring['exam'] = 0;
$fall['test'] = 0;
$spring['test'] = 0;
$fall['pay'] = 0;
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
        <td>
            <?php if ($data->type == Load::TYPE_PROJECT) {
                echo CHtml::link('редагувати', $this->createUrl('edit', array('id' => $data->id))) . '<br>';
                echo CHtml::link('видалити', $this->createUrl('delete', array('id' => $data->id)));
            } else echo CHtml::link('редагувати', $this->createUrl('update', array('id' => $data->id))); ?>
        </td>
        <td><b><?php echo $data->planSubject->subject->title; ?></b></td>
        <td><b><?php echo isset($data->teacher) ? $data->teacher->getFullName() :
                    '<span style="color: red">непризначено</span>'; ?></b></td>
        <td class="general"><?php echo $data->course; ?></td>
        <td><b><?php echo $data->group->title; ?></b></td>
        <td class="general"><?php echo $data->getStudentsCount(); ?></td>
        <td class="general"><?php echo $data->getBudgetStudentsCount(); ?></td>
        <td class="general"><?php echo $data->getContractStudentsCount(); ?></td>
        <td class="general">Кредитів ECTS</td>
        <td class="general"><?php echo $data->getPlanTotal(); ?></td>
        <td class="general"><?php echo $data->getPlanClasses(); ?></td>
        <td class="general"><?php echo $data->getPlanSelfwork(); ?></td>

        <td class="fall">
            <?php echo $total = $data->getTotal($fallSemester);
            $fall['total'] += intval($total); ?>
        </td>
        <td class="fall">
            <?php echo $selfwork = $data->getSelfwork($fallSemester);
            $fall['selfwork'] += intval($selfwork); ?>
        </td>
        <td class="fall">
            <?php echo $classes = $data->getClasses($fallSemester);
            $fall['classes'] += intval($classes); ?>
        </td>
        <td class="fall">
            <?php echo $lectures = $data->getLectures($fallSemester);
            $fall['lectures'] += intval($lectures); ?>
        </td>
        <td class="fall">
            <?php echo $labs = $data->getLabs($fallSemester);
            $fall['labs'] += intval($labs); ?>
        </td>
        <td class="fall">
            <?php echo $practs = $data->getPracts($fallSemester);
            $fall['practs'] += intval($practs); ?>
        </td>
        <td class="fall">
            <?php echo $project = $data->getProject($fallSemester);
            $fall['project'] = intval($project); ?>
        </td>
        <td class="fall">
            <?php echo $check = $data->getCheck($fallSemester);
            $fall['check'] = intval($check); ?>
        </td>
        <td class="fall">
            <?php echo $control = $data->getControl($fallSemester);
            $fall['control'] = intval($control); ?>
        </td>
        <td class="fall">
            <?php echo $works = $data->getControlWorks($fallSemester);
            $fall['works'] += intval($works); ?>
        </td>
        <td class="fall">
            <?php echo $dkk = $data->getDkk($fallSemester);
            $fall['dkk'] += intval($dkk); ?>
        </td>
        <td class="fall">
            <?php echo $consult = $data->getConsultation($fallSemester);
            $fall['consult'] += intval($consult); ?>
        </td>
        <td class="fall">
            <?php echo $exam = $data->getExam($fallSemester);
            $fall['exam'] += intval($exam); ?>
        </td>
        <td class="fall">
            <?php echo $test = $data->getTest($fallSemester);
            $fall['test'] += intval($test); ?>
        </td>
        <td class="fall">
            <b><?php echo $pay_fall = $data->getPay($fallSemester);
                $fall['pay'] += intval($pay_fall); ?></b>
        </td>

        <td class="spring">
            <?php echo $total = $data->getTotal($springSemester);
            $spring['total'] += intval($total); ?>
        </td>
        <td class="spring">
            <?php echo $selfwork = $data->getSelfWork($springSemester);
            $spring['selfwork'] += intval($selfwork); ?>
        </td>
        <td class="spring">
            <?php echo $classes = $data->getClasses($springSemester);
            $spring['classes'] += intval($classes); ?>
        </td>
        <td class="spring">
            <?php echo $lectures = $data->getLectures($springSemester);
            $spring['lectures'] += intval($lectures); ?>
        </td>
        <td class="spring">
            <?php echo $labs = $data->getLabs($springSemester);
            $spring['labs'] += intval($labs); ?>
        </td>
        <td class="spring">
            <?php echo $practs = $data->getPracts($springSemester);
            $spring['practs'] += intval($practs); ?>
        </td>
        <td class="spring">
            <?php echo $project = $data->getProject($springSemester);
            $spring['project'] += intval($project); ?>
        </td>
        <td class="spring">
            <?php echo $check = $data->getCheck($springSemester);
            $spring['check'] += intval($check); ?>
        </td>
        <td class="spring">
            <?php echo $control = $data->getControl($springSemester);
            $spring['control'] += intval($control); ?>
        </td>
        <td class="spring">
            <?php echo $works = $data->getControlWorks($springSemester);
            $spring['works'] += intval($works);?>
        </td>
        <td class="spring">
            <?php echo $dkk = $data->getDkk($springSemester);
            $spring['dkk'] += intval($dkk); ?>
        </td>
        <td class="spring">
            <?php echo $consult = $data->getConsultation($springSemester);
            $spring['consult'] += intval($consult);
            ?>
        </td>
        <td class="spring">
            <?php echo $exam = $data->getExam($springSemester);
            $spring['exam'] += $exam; ?>
        </td>
        <td class="spring">
            <?php echo $test = $data->getTest($springSemester);
            $spring['test'] += $data->getTest($springSemester); ?>
        </td>
        <td class="spring">
            <b><?php echo $pay_spring = $data->getPay($springSemester);
                $spring['pay'] += $pay_spring; ?></b>
        </td>

        <td>
            <?php echo $all = $pay_fall + $pay_spring;
            $totals['total'] += $all; ?>
        </td>
        <td>
            <?php echo $budget = round($all * $data->getBudgetPercent() / 100);
            $totals['budget'] += $budget; ?>
        </td>
        <td>
            <?php echo $contract = round($all * $data->getContractPercent() / 100);
            $totals['contract'] += $contract; ?>
        </td>
        <td>
            <?php if ($data->type == Load::TYPE_PROJECT)
                echo CHtml::link('видалити', $this->createUrl('delete', array('id' => $data->id)));
            else echo CHtml::link('редагувати', $this->createUrl('update', array('id' => $data->id))); ?>
        </td>
    </tr>
<?php endforeach; ?>
<!-- Підсумки -->
<tr>
    <td colspan="4"><b>Всього</b></td>
    <td class="general" colspan="8"></td>
    <td class="fall"><?php echo $fall['total']; ?></td>
    <td class="fall"><?php echo $fall['selfwork']; ?></td>
    <td class="fall"><?php echo $fall['classes']; ?></td>
    <td class="fall"><?php echo $fall['lectures']; ?></td>
    <td class="fall"><?php echo $fall['labs']; ?></td>
    <td class="fall"><?php echo $fall['practs']; ?></td>
    <td class="fall"><?php echo $fall['project']; ?></td>
    <td class="fall"><?php echo $fall['check']; ?></td>
    <td class="fall"><?php echo $fall['control']; ?></td>
    <td class="fall"><?php echo $fall['works']; ?></td>
    <td class="fall"><?php echo $fall['dkk']; ?></td>
    <td class="fall"><?php echo $fall['consult']; ?></td>
    <td class="fall"><?php echo $fall['exam']; ?></td>
    <td class="fall"><?php echo $fall['test']; ?></td>
    <td class="fall"><?php echo $fall['pay']; ?></td>

    <td class="spring"><?php echo $spring['total']; ?></td>
    <td class="spring"><?php echo $spring['selfwork']; ?></td>
    <td class="spring"><?php echo $spring['classes']; ?></td>
    <td class="spring"><?php echo $spring['lectures']; ?></td>
    <td class="spring"><?php echo $spring['labs']; ?></td>
    <td class="spring"><?php echo $spring['practs']; ?></td>
    <td class="spring"><?php echo $spring['project']; ?></td>
    <td class="spring"><?php echo $spring['check']; ?></td>
    <td class="spring"><?php echo $spring['control']; ?></td>
    <td class="spring"><?php echo $spring['works']; ?></td>
    <td class="spring"><?php echo $spring['dkk']; ?></td>
    <td class="spring"><?php echo $spring['consult']; ?></td>
    <td class="spring"><?php echo $spring['exam']; ?></td>
    <td class="spring"><?php echo $spring['test']; ?></td>
    <td class="spring"><?php echo $spring['pay']; ?></td>

    <td><?php echo $totals['total']; ?></td>
    <td><?php echo $totals['budget']; ?></td>
    <td><?php echo $totals['contract']; ?></td>
    <td></td>
</tr>
<!-- Підсумки кінець -->
</table>
</div>

</div>
