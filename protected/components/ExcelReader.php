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
        for ($row = 5; $row < $highestRow; $row+=2) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $data = $rowData[0];

            $group = Group::model()->findByAttributes(array(
                'title' => $data[18],
            ));

            if ($group == null) {
                continue;
            }

            $model = Student::model()->findByAttributes(array('sseed_id' => trim($data[0])));
            if ($model !== NULL) {
                $student = $model;
            } else {
                $student = new Student();
                $student->sseed_id = trim($data[0]);
            }

            $names = explode(' ', $data[1]);

            $student->last_name = $names[0];
            $student->first_name = $names[1];
            $student->middle_name = $names[2];
            $student->gender = intval($data[6] != 'Чоловіча');
            $student->birth_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data[5]));
            $student->admission_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data[15]));
            $student->admission_order_number = $data[32] + 0;
            $student->education_document = $data[10] .' ' . $data[12] . ' ' . $data[13];
            $student->document = $data[4];
            $student->identification_code = $data[9];

            $student->group_id = $group->id;

            /*if (!$student->save()) {
                print_r($student->getErrors());
                die();
            }*/

            $student->save();

            $students [] = $student;
        }
        return $students;
    }
}