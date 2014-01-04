<?php
/**
 * PhpAuthManager, extended from CPhpAuthManager
 *
 * @category  commons
 * @package   common.components
 * @author Vadim Poplavskiy <im@demetrodon.com>
 * @copyright 2013 WAO Group
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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