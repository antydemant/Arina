<?php

/**
 * @author Serhiv Vinichuk <serhiyvinichuk@gmail.com>
 * Class StudyPlanModule
 */
class StudyPlanModule extends CWebModule
{
    public $defaultController = 'main';

    public function init()
    {
        $this->setImport(array(
            'studyPlan.models.*',
            'studyPlan.components.*',
        ));

    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }
}
