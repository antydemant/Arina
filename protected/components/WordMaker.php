<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class WordMaker extends CComponent
{
    public $templatesPath = 'public.files.templates';

    /* @var $phpWord PHPWord */
    protected $phpWord;
    public function init()
    {
        $phpWordPath = Yii::getPathOfAlias('vendor.phpword.phpword.Library');
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        include($phpWordPath . DIRECTORY_SEPARATOR . 'PHPWord.php');
        spl_autoload_register(array('YiiBase', 'autoload'));
    }

    public function getDocument($data, $name)
    {
        $methodName = 'make' . ucfirst($name);
        if (method_exists($this, $methodName)) {
            $this->$methodName($data);
            $docName = $name . date("d.m.Y", time());
            $objWriter = PHPWord_IOFactory::createWriter($this->phpWord, 'Word2007');
    /*        header('Content-Type: application/vnd.ms-word');
            header('Content-Disposition: attachment;filename="' . $docName . '.docx"');
            header('Cache-Control: max-age=0');
            $objWriter->save('php://output');*/
        } else {
            throw new CException(Yii::t('error', 'Method "{method}" not found', array('{method}' => $methodName)));
        }
    }

    /**
     * @param $data
     * @return PHPWord
     */
    public function makeTest($data)
    {
        $document = $this->loadTemplate('5.03.docx');
        //$document->setValue('name1', 'Sun');
        //$section = $this->phpWord->createSection();
        return true;
    }

    /**
     * @param $students
     * @return mixed
     */
    public function makeSimpleGroupList($students)
    {
        return true;
    }

    /**
     * @param $alias
     * @return PHPWord_Template
     * @throws CException
     */
    protected function loadTemplate($alias)
    {
        $fileName = Yii::getPathOfAlias($this->templatesPath) . DIRECTORY_SEPARATOR . $alias;
        if (file_exists($fileName)) {
            $this->phpWord = new PHPWord();
            $PHPWord = new PHPWord();

            $document = $PHPWord->loadTemplate($fileName);

            $document->setValue('name1', 'Sun');
            $document->setValue('Value2', 'Mercury');
            $document->setValue('Value3', 'Venus');
            $document->setValue('Value4', 'Earth');
            $document->setValue('Value5', 'Mars');
            $document->setValue('Value6', 'Jupiter');
            $document->setValue('Value7', 'Saturn');
            $document->setValue('Value8', 'Uranus');
            $document->setValue('Value9', 'Neptun');
            $document->setValue('Value10', 'Pluto');
            $document->setValue('Value11','goodluck');
            $document->setValue('weekday', date('l'));
            $document->setValue('time', date('H:i'));
            $document->save(Yii::getPathOfAlias($this->templatesPath) . DIRECTORY_SEPARATOR .'tmp.docx');
//$aa=time()."docx";
//$document->save($aa);

            header('Content-Type: application/vnd.ms-word');
            header('Content-Disposition: attachment;filename="01simple.docx"');
            header('Cache-Control: max-age=0');
            $writer=PHPWord_IOFactory::createWriter($PHPWord,"Word2007");
            $writer->save("php://output");

            $objPHPWord = $this->phpWord->loadTemplate($fileName);
            return $objPHPWord;
        } else {
            throw new CException(Yii::t('error', 'Template "{name}" not found', array('{name}' => $alias)));
        }
    }

}