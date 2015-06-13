<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class SubjectTable extends CWidget
{
    public $subjectDataProvider;

    public function init()
    {
        if ($this->subjectDataProvider === null)
            throw new Exception('Властивість subjectDataProvider має бути задана', 1);
    }

    public function run()
    {
        $this->render('subject_table', array('dataProvider' => $this->subjectDataProvider));
    }
} 