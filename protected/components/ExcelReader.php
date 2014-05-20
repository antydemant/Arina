<?php

class ExcelReader extends CComponent
{
    public function init()
    {
        $phpExcelPath = Yii::getPathOfAlias('vendor.phpexcel.phpexcel.Classes');
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
        spl_autoload_register(array('YiiBase', 'autoload'));
    }

    public function importStudents($fileName)
    {
        try {
            $inputFileType = PHPExcel_IOFactory::identify($fileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($fileName);
            $objReader->setReadDataOnly(false);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($fileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $students = array();
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $data = $rowData[0];

            $student = new Student();
            $student->code = $data[0];

            $names = explode(' ', $data[1]);

            $student->last_name = $names[0];
            $student->first_name = $names[1];
            $student->middle_name = $names[2];
            $student->gender = 1;
            $student->group_id = 9;

            $student->birth_date = date('d.m.Y', PHPExcel_Shared_Date::ExcelToPHP($data[2]));

            //$student->save();

            $students [] = $student;
        }
        return $students;
    }
}