<?php

/**
 * @author Serhiv Vinichuk <serhiyvinichuk@gmail.com>
 * Class LoadModule
 */
class LoadModule extends CWebModule
{
    public $defaultController = 'main';

    public function init()
    {
        $this->setImport(array(
            'load.models.*',
            'load.components.*',
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
