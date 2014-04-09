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
     * @param PHPExcel_Worksheet $sheet
     * @param $cell
     * @param $value
     * @param string $alias
     */
    public function setValue($sheet, $cell, $value, $alias='@value')
    {
        $sheet->setCellValue($cell, str_replace($alias, $value, $sheet->getCell($cell)->getCalculatedValue()));
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

}