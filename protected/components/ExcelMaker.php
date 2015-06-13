<?php

/**
 * Class for generation excel documents
 * To add a new document template you need to create a method
 * with name witch begin from makeAliasOfDocument
 * and can use it:
 * <pre>
 * $excel = Yii::app()->getComponent('excel');
 * $object = new SomeObjectForDocument
 * $excel->getDocument($object, 'aliasOfDocument');
 * </pre>
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class ExcelMaker extends CComponent
{
    /**
     * @var string alias of path to directory with templates
     */
    public $templatesPath = 'public.files.templates';

    /**
     * Load PHPExcel
     */
    public function init()
    {
        $phpExcelPath = Yii::getPathOfAlias('vendor.phpexcel.phpexcel.Classes');
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
        spl_autoload_register(array('YiiBase', 'autoload'));
    }

    /**
     * Call method for generation current document
     * @param mixed $data source for document
     * @param $name
     * @throws CException
     */
    public function getDocument($data, $name)
    {
        $methodName = 'make' . ucfirst($name);
        if (method_exists($this, $methodName)) {
            $objPHPExcel = $this->$methodName($data);
            $docName = "$name " . date("d.m.Y G-i", time());
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $docName . '.xls"');
            header('Cache-Control: max-age=0');
            $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
            $objWriter->save('php://output');
        } else {
            throw new CException(Yii::t('error', 'Method "{method}" not found', array('{method}' => $methodName)));
        }
    }

    /**
     *
     * @param $data Load[]
     * @return PHPExcel
     */
    public function makeLoad($data)
    {
        $objPHPExcel = $this->loadTemplate('load.xls');
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $row = 6;
        $i = 1;
        foreach ($data as $load) {

            $springSemester = $load->course * 2-1;
            $fallSemester = $springSemester - 1;

            $sheet->setCellValue("A$row", $i);
            $subject = $load->planSubject->subject;
            $sheet->setCellValue("B$row", $subject->code);
            $sheet->setCellValue("C$row", $subject->title);
            $sheet->setCellValue("D$row", (isset($load->teacher) ? $load->teacher->getNameWithInitials() : 'непризначено'));
            $group = $load->group;
            $sheet->setCellValue("E$row", $group->getCourse($load->study_year_id));
            $sheet->setCellValue("F$row", $group->title);
            $sheet->setCellValue("G$row", $load->getStudentsCount());
            $sheet->setCellValue("H$row", $load->getBudgetStudentsCount());
            $sheet->setCellValue("I$row", $load->getContractStudentsCount());
            $sheet->setCellValue("J$row", $load->getPlanCredits());
            $sheet->setCellValue("K$row", $load->getPlanTotal());

            $sheet->setCellValue("L$row", $load->getTotal($fallSemester));
            $sheet->setCellValue("N$row", $load->getPlanClasses());
            $sheet->setCellValue("O$row", $load->getSelfwork($fallSemester));
            $sheet->setCellValue("P$row", $load->getClasses($fallSemester));
            $sheet->setCellValue("Q$row", $load->getLectures($fallSemester));
            $sheet->setCellValue("S$row", $load->getLabs($fallSemester));
            $sheet->setCellValue("U$row", $load->getPracts($fallSemester));
            $sheet->setCellValue("Y$row", $load->getProject($fallSemester));
            $sheet->setCellValue("Z$row", $load->getCheck($fallSemester));
            $sheet->setCellValue("AA$row", $load->getControl($fallSemester));
            $sheet->setCellValue("AB$row", $load->getControlWorks($fallSemester));
            $sheet->setCellValue("AC$row", $load->getDkk($fallSemester));
            $sheet->setCellValue("AD$row", $load->getConsultation($fallSemester));
            $sheet->setCellValue("AE$row", $load->getExam($fallSemester));
            $sheet->setCellValue("AF$row", $load->getTest($fallSemester));
            $sheet->setCellValue("AG$row", $load->getPay($fallSemester));

            $sheet->setCellValue("AH$row", $load->getTotal($springSemester));
            $sheet->setCellValue("AI$row", $load->getSelfWork($springSemester));
            $sheet->setCellValue("AJ$row", $load->getClasses($springSemester));
            $sheet->setCellValue("AK$row", $load->getLectures($springSemester));
            $sheet->setCellValue("AL$row", $load->getLabs($springSemester));
            $sheet->setCellValue("AM$row", $load->getPracts($springSemester));
            $sheet->setCellValue("AO$row", $load->getProject($springSemester));
            $sheet->setCellValue("AP$row", $load->getCheck($springSemester));
            $sheet->setCellValue("AQ$row", $load->getControl($springSemester));
            $sheet->setCellValue("AR$row", $load->getControlWorks($springSemester));
            $sheet->setCellValue("AS$row", $load->getDkk($springSemester));
            $sheet->setCellValue("AT$row", $load->getConsultation($springSemester));
            $sheet->setCellValue("AU$row", $load->getExam($springSemester));
            $sheet->setCellValue("AV$row", $load->getTest($springSemester));
            $sheet->setCellValue("AW$row", $load->getPay($springSemester));
            $all = $load->getPay($fallSemester) + $load->getPay($springSemester);
            $sheet->setCellValue("AX$row", $all);
            $sheet->setCellValue("AY$row", round($all * $load->getBudgetPercent() / 100));
            $sheet->setCellValue("AZ$row", round($all * $load->getContractPercent() / 100));

            $sheet->getStyle("A$row:AZ$row")->applyFromArray(self::getBorderStyle());
            $i++;
            $row++;
            $sheet->insertNewRowBefore($row + 1, 1);
        }

        $sheet->setCellValue("D$row", 'Всього');
        $last = $row - 1;
        for ($c = 6; $c < 45; $c++) {
            $index = PHPExcel_Cell::stringFromColumnIndex($c);
            $sheet->setCellValue("$index$row", "=SUM({$index}6:$index$last)");
        }
        $objPHPExcel->setActiveSheetIndex(0);
        return $objPHPExcel;
    }

    /**
     * @param Group $group
     * @return mixed
     */
    public function makeSimpleGroupList($group)
    {
        $objPHPExcel = $this->loadTemplate('5.03.xls');
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->setCellValue('A10', Settings::getValue('name'));
        $this->setValue($sheet, 'A13', $group->speciality->department->title);
        $this->setValue($sheet, 'A14', $group->speciality->title);
        $this->setValue($sheet, 'A15', $group->getCourse());
        $this->setValue($sheet, 'C15', $group->title);
        $this->setValue($sheet, 'C17', GlobalHelper::getCurrentYear(1), '@value1');
        $this->setValue($sheet, 'C17', GlobalHelper::getCurrentYear(2), '@value2');
        $k = $i = 40;
        foreach ($group->students as $item) {
            /**@var Student $item */
            $sheet->setCellValue("A$i", $i - $k + 1);
            $sheet->setCellValue("B$i", $item->getShortFullName());
            $sheet->insertNewRowBefore($i + 1, 1);
            $i++;
        }
        $sheet->removeRow($i);
        return $objPHPExcel;
    }

    /**
     * @param $group
     * @return PHPExcel
     */
    public function makeGroupList($group)
    {
        $objPHPExcel = $this->loadTemplate('simple_group_list.xls');
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->setCellValue('A10', Settings::getValue('name'));
        $this->setValue($sheet, 'A13', $group->speciality->department->title);
        $this->setValue($sheet, 'A14', $group->speciality->title);
        $this->setValue($sheet, 'A15', $group->getCourse());
        $this->setValue($sheet, 'C15', $group->title);
        $this->setValue($sheet, 'C17', GlobalHelper::getCurrentYear(1), '@value1');
        $this->setValue($sheet, 'C17', GlobalHelper::getCurrentYear(2), '@value2');
        $k = $i = 24;
        foreach ($group->students as $item) {
            /**@var Student $item */
            $sheet->setCellValue("A$i", $i - $k + 1);
            $sheet->setCellValue("B$i", $item->getShortFullName());
            $sheet->setCellValue("C$i", ($item->contract?'к':''));
            $sheet->insertNewRowBefore($i + 1, 1);
            $i++;
        }
        $sheet->removeRow($i);
        return $objPHPExcel;
    }

    /**
     * Load template document
     * @param $alias
     * @param string $fileType version of template
     * @return PHPExcel
     * @throws CException
     */
    protected function loadTemplate($alias, $fileType = 'Excel5')
    {
        $fileName = Yii::getPathOfAlias($this->templatesPath) . DIRECTORY_SEPARATOR . $alias;
        if (file_exists($fileName)) {
            $objReader = PHPExcel_IOFactory::createReader($fileType);
            $objPHPExcel = $objReader->load($fileName);
            return $objPHPExcel;
        } else {
            throw new CException(Yii::t('error', 'Template "{name}" not found', array('{name}' => $alias)));
        }
    }

    /**
     * Find alias in cell and replace it into current value
     * @param PHPExcel_Worksheet $sheet
     * @param $cell
     * @param $value
     * @param string $alias
     */
    public function setValue($sheet, $cell, $value, $alias = '@value')
    {
        $sheet->setCellValue($cell, str_replace($alias, $value, $sheet->getCell($cell)->getCalculatedValue()));
    }

    protected static function getBorderStyle()
    {
        return array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
        );
    }

    /**
     * @param $model GroupDocForm
     * @return PHPExcel
     */
    protected function makeExamSheet($model)
    {
        $objPHPExcel = $this->loadTemplate('exam.xls');
        $sheet = $sheet = $objPHPExcel->setActiveSheetIndex(0);

        $sheet->setCellValue('A15', $model->teacher);
        $sheet->setCellValue('A5', $model->group->speciality->department->head->getFullName());
        $sheet->setCellValue('A11', $model->subject->title);
        $sheet->setCellValue('F14', $model->group->title);
        $sheet->setCellValue('B14', $model->semester);
        $sheet->setCellValue('D14', $model->getCourse());

        for ($i = 0; $i < count($model->group->students); $i++) {
            $sheet->setCellValue('A' . (19 + $i), $i + 1);
            $sheet->setCellValue('B' . (19 + $i), $model->group->students[$i]->fullName);
            $sheet->insertNewRowBefore($i + 20, 1);
        }
        $sheet->removeRow($i + 20);
        $sheet->setCellValue('D' . (20 + $i), '=average(D19:D' . ($i + 19) . ')');
        $sheet->setCellValue('E' . (25 + $i), $model->teacher);
        $sheet->setCellValue('B' . (27 + $i), 'Дата:' . $model->date);
        return $objPHPExcel;
    }

    /**
     * @param $data TeacherDocument
     * @return PHPExcel
     */
    protected function makeTeacherList($data)
    {
        $objPHPExcel = $this->loadTemplate('teacherList.xls');

        return $objPHPExcel;
    }

    /**
     * Generate study plan document
     * @param $plan StudyPlan
     * @return PHPExcel
     */
    protected function makeStudyPlan($plan)
    {
        $objPHPExcel = $this->loadTemplate('plan.xls');

        //SHEET #1
        $sheet = $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->setCellValue("F19", $plan->speciality->number . ' ' . $plan->speciality->title);
        $sheet->setCellValue("W13", $plan->speciality->discipline);
        $sheet->setCellValue("E16", $plan->speciality->direction);
        $sheet->setCellValue("AS11", $plan->speciality->qualification);
        $sheet->setCellValue("AT13", $plan->speciality->apprenticeship);
        $sheet->setCellValue("F25", $plan->speciality->education_form);

        // table #1
        for ($i = 0; $i < count($plan->graph); $i++) {
            $char = 'B';
            for ($j = 0; $j < count($plan->graph[$i]); $j++) {
                $sheet->setCellValue($char . ($i + 32), Yii::t('plan', $plan->graph[$i][$j]));
                $char++;
            }
        }

        // table #2
        $i = 46;
        $totals = array(
            'T' => 0,
            'P' => 0,
            'DA' => 0,
            'DP' => 0,
            'H' => 0,
            'S' => 0,
            ' ' => 0,
        );
        foreach ($plan->graph as $item) {
            $result = array_count_values($item);
            foreach ($result as $key => $value) {
                $totals[$key] += $value;
            }

            $sheet->setCellValue('A' . $i, $i - 45);
            if (isset($result['S'])) {
                $sheet->setCellValue('E' . $i, $result['S']);
            }
            if (isset($result['P'])) {
                $sheet->setCellValue('G' . $i, $result['P']);
            }
            if (isset($result['DA'])) {
                $sheet->setCellValue('I' . $i, $result['DA']);
            }
            if (isset($result['DP'])) {
                $sheet->setCellValue('K' . $i, $result['DP']);
            }
            if (isset($result['T'])) {
                $sheet->setCellValue('C' . $i, $result['T']);
            }
            if (isset($result['H'])) {
                $sheet->setCellValue('M' . $i, $result['H']);
            }
            if (isset($result[' '])) {
                $sheet->setCellValue('P' . $i, 52 - $result[' ']);
            } else {
                $sheet->setCellValue('P' . $i, 52);
            }
            $sheet->getStyle("A$i:R$i")->applyFromArray(self::getBorderStyle());
            $i++;
        }
        $sheet->setCellValue('A' . $i, 'Разом');
        $sheet->setCellValue('E' . $i, $totals['S']);
        $sheet->setCellValue('G' . $i, $totals['P']);
        $sheet->setCellValue('I' . $i, $totals['DA']);
        $sheet->setCellValue('K' . $i, $totals['DP']);
        $sheet->setCellValue('C' . $i, $totals['T']);
        $sheet->setCellValue('M' . $i, $totals['H']);
        $sheet->setCellValue('P' . $i, 52 * count($plan->graph) - $totals[' ']);
        $sheet->getStyle("A$i:R$i")->applyFromArray(self::getBorderStyle());

        // table #3 / table #4
        $i = 46;
        $z = 46;
        foreach ($plan->subjects as $item) {
            if ($item->subject->practice) {
                $sheet->setCellValue('T' . $i, $item->subject->title);
                $sheet->setCellValue('AG' . $i, $item->practice_weeks);
                for ($j = 0; $j < count($item->control); $j++) {
                    if ($item->control[$j][0]) {
                        $sheet->setCellValue("AF$i", $j + 1);
                    }
                }
                $sheet->getStyle("T$i:AH$i")->applyFromArray(self::getBorderStyle());
                $i++;
            }
            for ($k = 0; $k < count($item->control); $k++) {
                $semester = $item->control[$k];
                $list = array(2 => 'ДПА', 3 => 'ДА');
                foreach ($list as $key => $name) {
                    if ($semester[$key]) {
                        $sheet->setCellValue("AJ$z", $item->subject->title);
                        $sheet->setCellValue("AT$z", $name);
                        $sheet->setCellValue("BC$z", $k + 1);
                        $sheet->getStyle("AJ$z:BC$z")->applyFromArray(self::getBorderStyle());
                        $z++;
                    }
                }
            }

        }

        //SHEET #2
        $sheet = $sheet = $objPHPExcel->setActiveSheetIndex(2);

        $j = 'N';
        $i = 8;
        foreach ($plan->semesters as $item) {
            $sheet->setCellValue($j . $i, $item);
            $j++;
        }
        $i++;
        $j = 1;
        $totals = array();
        foreach ($plan->getSubjectsByCycles() as $name => $group) {
            $sheet->setCellValue("B$i", $name);
            $sheet->insertNewRowBefore($i + 1, 1);
            $i++;
            $begin = $i;
            $jj = 1;
            foreach ($group as $item) {
                /**@var $item StudySubject */
                $sheet->setCellValue("A$i", $item->subject->code);
                $sheet->setCellValue("B$i", $item->subject->getCycle($plan->speciality_id)->id . '.' . $jj . $item->getTitle());
                $sheet->setCellValue("C$i", $item->getExamSemesters());
                $sheet->setCellValue("D$i", $item->getTestSemesters());
                $sheet->setCellValue("E$i", $item->getWorkSemesters());
                $sheet->setCellValue("F$i", $item->getProjectSemesters());
                $sheet->setCellValue("G$i", round($item->total / 54, 2));
                $sheet->setCellValue("H$i", $item->total);
                $sheet->setCellValue("I$i", $item->getClasses());
                $sheet->setCellValue("J$i", $item->lectures);
                $sheet->setCellValue("K$i", $item->labs);
                $sheet->setCellValue("L$i", $item->practs);
                $sheet->setCellValue("M$i", $item->getSelfwork());
                $char = 'N';
                foreach ($item->weeks as $key => $week) {
                    $sheet->setCellValue($char . $i, $week);
                    $char++;
                }
                $sheet->insertNewRowBefore($i + 1, 1);
                $i++;
                $jj++;
            }
            $end = $i - 1;
            $sheet->setCellValue("B$i", Yii::t('base', 'Total'));
            $totals[] = $i;
            for ($c = 'G'; $c < 'V'; $c++) {
                $sheet->setCellValue("$c$i", "=SUM($c$begin:$c$end)");
            }
            $sheet->insertNewRowBefore($i + 1, 1);
            $i++;
            $j++;
        }
        $sheet->setCellValue("B$i", Yii::t('base', 'Total amount'));
        for ($c = 'G'; $c < 'V'; $c++) {
            $sheet->setCellValue("$c$i", "=SUM($c" . implode("+$c", $totals) . ')');
        }
        return $objPHPExcel;
    }

    /**
     * @param $plan WorkPlan
     * @return PHPExcel
     */
    protected function makeWorkPlan($plan)
    {
        $objPHPExcel = $this->loadTemplate('work.xls');

        $coursesAmount = $plan->getCourseAmount();
        $groupsByCourse = $plan->speciality->getGroupsByStudyYear($plan->year_id);
        $graphOffset = 0;
        for ($i = 0; $i < $coursesAmount; $i++) {
            $groups = array();
            foreach ($groupsByCourse as $group => $course) {
                if ($course == $i + 1) {
                    $groups[] = $group;
                }
            }
            $sheet = $sheet = $objPHPExcel->setActiveSheetIndex($i);
            $this->makeWorkPlanPage($plan, $i + 1, $sheet, $groups, $graphOffset);
            $graphOffset += count($groups);
        }
        $objPHPExcel->setActiveSheetIndex(0);
        return $objPHPExcel;
    }

    /**
     * @param $plan WorkPlan
     * @param $course
     * @param $sheet PHPExcel_Worksheet
     * @param $groups
     * @param $graphOffset
     */
    protected function makeWorkPlanPage($plan, $course, $sheet, $groups, $graphOffset)
    {
        $this->setValue($sheet, 'R8', $course);

        $sheet->setCellValue('R3', Settings::getValue('name'));
        $beginYear = $plan->year->begin;
        $endYear = $plan->year->end;
        $this->setValue($sheet, 'R5', $beginYear, '@begin');
        $this->setValue($sheet, 'R5', $endYear, '@end');
        $this->setValue($sheet, 'Y17', $course);
        $this->setValue($sheet, 'AS17', $course + 1);
        $sheet->setCellValue('AP17', $plan->semesters[$course - 1]);
        $sheet->setCellValue('BJ17', $plan->semesters[$course]);
        $specialityFullName = $plan->speciality->number . ' "' . $plan->speciality->title . '"';
        $this->setValue($sheet, 'R6', $specialityFullName);
        //groups graph;
        $colNumber = PHPExcel_Cell::columnIndexFromString('G');
        for ($i = 0; $i < count($groups); $i++) {
            $rowIndex = $i + 11;
            $sheet->setCellValue("G$rowIndex", $groups[$i]);
            for ($j = 0; $j < 52; $j++) {
                $colString = PHPExcel_Cell::stringFromColumnIndex($colNumber + $j);
                $k = $i + $graphOffset;
                if (isset($plan->graph[$k][$j])) {
                    $sheet->setCellValue($colString . $rowIndex, Yii::t('plan', $plan->graph[$k][$j]));
                }
            }
            $sheet->getStyle("G$rowIndex:BG$rowIndex")->applyFromArray(self::getBorderStyle());
        }

        //hours table
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

        $row = 23;
        $i = 0;
        $id = 1;
        $totals = array();
        $subjectsGroups = $plan->getSubjectsByCycles($course);
        foreach ($subjectsGroups as $cycle => $subjects) {

            $sheet->setCellValue("C$row", $cycle);
            $sheet->setCellValue("A$row", $id++);


            $i++;
            $row++;

            $this->workPlanInsertNewLine($sheet, $row);


            $j = 0;
            $begin = $row;
            foreach ($subjects as $item) {


                /**@var $item WorkSubject */
                $sheet->setCellValue("B$row", $item->subject->code);
                $sheet->setCellValue("A$row", $id++);
                $sheet->setCellValue("C$row", $item->subject->getCycle($plan->speciality_id)->id . '.' . ($j + 1) . ' ' . $item->getTitle());
                $sum = array_sum(isset($item->subject) ? $item->total : array());
                $sheet->setCellValue("O$row", $sum / 54);
                $sheet->setCellValue("Q$row", $sum);
                //FALL
                $sheet->setCellValue("Y$row", $item->total[$fall]);
                $sheet->setCellValue("AA$row", $item->getClasses($fall));
                $sheet->setCellValue("AC$row", $item->lectures[$fall]);
                $sheet->setCellValue("AE$row", $item->labs[$fall]);
                $sheet->setCellValue("AG$row", $item->practs[$fall]);
                $sheet->setCellValue("AI$row", $item->getSelfwork($fall));
                $sheet->setCellValue("AK$row", ($item->control[$fall][4] || $item->control[$fall][5]) ? $item->project_hours : '');
                $sheet->setCellValue("AN$row", $item->weeks[$fall]);
                $sheet->setCellValue("AO$row", (($item->control[$fall][1]) ? 1 : ''));
                $sheet->setCellValue("AQ$row", (($item->control[$fall][0]) ? 1 : ''));

                //SPRING
                $sheet->setCellValue("AS$row", $item->total[$spring]);
                $sheet->setCellValue("AU$row", $item->getClasses($spring));
                $sheet->setCellValue("AW$row", $item->lectures[$spring]);
                $sheet->setCellValue("AY$row", $item->labs[$spring]);
                $sheet->setCellValue("BA$row", $item->practs[$spring]);
                $sheet->setCellValue("BC$row", $item->getSelfwork($spring));
                $sheet->setCellValue("BE$row", ($item->control[$spring][4] || $item->control[$spring][5]) ? $item->project_hours : '');
                $sheet->setCellValue("BH$row", $item->weeks[$spring]);
                $sheet->setCellValue("BI$row", (($item->control[$spring][1]) ? 1 : ''));
                $sheet->setCellValue("BK$row", (($item->control[$spring][0]) ? 1 : ''));

                //CYCLE COMMISSION

                $sheet->setCellValue("BM$row", $item->cycleCommission->title);

                $j++;
                $row++;

                $this->workPlanInsertNewLine($sheet, $row);

            }

            $end = $row - 1;

            $sheet->setCellValue("C$row", Yii::t('base', 'Total'));
            $totals[] = $row;
            for ($c = 14; $c < 45; $c++) {
                $index = PHPExcel_Cell::stringFromColumnIndex($c);
                $sheet->setCellValue("$index$row", "=SUM($index$begin:$index$end)");
            }

            $row++;

            $this->workPlanInsertNewLine($sheet, $row);
        }
        $sheet->removeRow($row);
        $sheet->setCellValue("C$row", 'Разом');

        for ($c = 14; $c < 45; $c++) {
            $index = PHPExcel_Cell::stringFromColumnIndex($c);
            $sheet->setCellValue("$index$row", "=SUM($index" . implode("+$index", $totals) . ')');
        }
        $row += 6;
        $this->setValue($sheet, "AD$row", $plan->speciality->department->head->getFullName());
    }

    /**
     * @param $sheet PHPExcel_Worksheet
     * @param $row
     */
    public function workPlanInsertNewLine($sheet, $row)
    {
        $sheet->insertNewRowBefore($row, 1);
        $sheet->mergeCells("C$row:N$row");
        $exclude = array(32, 38, 52, 58);
        for ($i = 14; $i < 66; $i += 2) {
            if (in_array($i, $exclude)) continue;
            $index1 = PHPExcel_Cell::stringFromColumnIndex($i);
            $index2 = PHPExcel_Cell::stringFromColumnIndex($i + 1);
            $sheet->mergeCells("$index1$row:$index2$row");
        }
    }

    protected function makeEmployeesList($data)
    {
        $objPHPExcel = $this->loadTemplate('teachers_list.xls');

        $sheet = $objPHPExcel->setActiveSheetIndex(0);

        $employees = Employee::model()->with(array('position'=>array('together'=>true)))->findAll();

        $i = 9;
        /** @var $employee Employee */
        foreach ($employees as $employee) {
            $sheet->setCellValue("A$i", $i - 8);
            $sheet->setCellValue("B$i", $employee->getFullName());
            $sheet->setCellValue("C$i", isset($employee->position) ? $employee->position->title : '');

            //$sheet->insertNewRowBefore($i + 1, 1);
            $i++;
            $sheet->getStyle("A$i:C$i")->applyFromArray(self::getBorderStyle());
        }

        $i+=2;
        $sheet->setCellValue("A$i", "Директор інституту, декан факультету, завідувач відділення ______________ ______________");
        $sheet->setCellValue("E$i", "     (прізвище та ініціали)");

        return $objPHPExcel;
    }
}