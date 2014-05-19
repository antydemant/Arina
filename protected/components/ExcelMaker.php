<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class ExcelMaker extends CComponent
{
    public $templatesPath = 'public.files.templates';

    public function init()
    {
        $phpExcelPath = Yii::getPathOfAlias('vendor.phpexcel.phpexcel.Classes');
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
        spl_autoload_register(array('YiiBase', 'autoload'));
    }

    public function getDocument($data, $name)
    {
        $methodName = 'make' . ucfirst($name);
        if (method_exists($this, $methodName)) {
            $objPHPExcel = $this->$methodName($data);
            $docName = "$name " . date("d.m.Y G-i", time());
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $docName . '.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
        } else {
            throw new CException(Yii::t('error', 'Method "{method}" not found', array('{method}' => $methodName)));
        }
    }

    /**
     * @param $data
     * @return PHPExcel
     */
    public function makeTest($data)
    {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'wqeqw');

        $objPHPExcel->getActiveSheet()->setTitle('Simple');

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
     * @param $alias
     * @param string $fileType
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
     * @param PHPExcel_Worksheet $sheet
     * @param $cell
     * @param $value
     * @param string $alias
     */
    public function setValue($sheet, $cell, $value, $alias = '@value')
    {
        $sheet->setCellValue($cell, str_replace($alias, $value, $sheet->getCell($cell)->getCalculatedValue()));
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
     * @param $plan StudyPlan
     * @return PHPExcel
     */
    protected function makeStudyPlan($plan)
    {
        $objPHPExcel = $this->loadTemplate('plan.xls');

        //SHEET #1
        $sheet = $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->setCellValue("F19", $plan->speciality->number . ' ' . $plan->speciality->title);

        for ($i = 0; $i < count($plan->graph); $i++) {
            $char = 'B';
            for ($j = 0; $j < count($plan->graph[$i]); $j++) {
                $sheet->setCellValue($char . ($i + 32), Yii::t('plan', $plan->graph[$i][$j]));
                $char++;
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
        foreach ($plan->getSubjectsByGroups() as $name => $group) {
            $sheet->setCellValue("B$i", "$j. " . $name);
            $sheet->insertNewRowBefore($i + 1, 1);
            $i++;
            $begin = $i;
            $jj = 1;
            foreach ($group as $item) {
                /**@var $item StudySubject */
                $sheet->setCellValue("A$i", $item->subject->code);
                $sheet->setCellValue("B$i", "$j.$jj. " . $item->subject->title);
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

}