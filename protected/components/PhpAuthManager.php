<?php
/**
 * PhpAuthManager, extended from CPhpAuthManager
 *
 */
class PhpAuthManager extends CPhpAuthManager
{
    public function init()
    {
        if ($this->authFile === null) {
            $this->authFile = Yii::getPathOfAlias('common.config.auth') . '.php';
        }

        parent::init();

        if (!Yii::app()->user->isGuest) {
            $this->assign(Yii::app()->user->role, Yii::app()->user->id);
        }
    }
}