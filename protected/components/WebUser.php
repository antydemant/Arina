<?php
/**
 * Permission of standard CWebUser.
 *
 * It is added:
 * - Receiving username of the user from the table in base - getUsername ();
 *
 * @category  common
 * @package   common.components
 * @author Vadim Poplavskiy <im@demetrodon.com>
 * @copyright 2013 WAO Group
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class WebUser extends CWebUser
{
    /**
     * @var null flowing values for result of model
     */
    private $_model = null;

    function getRole() {
        if($user = $this->getModel()){
            return $user->role;
        }
        return BaseUser::ROLE_GUEST;
    }

    public function getPriceType()
    {
        switch ($this->getRole()) {
            case BaseUser::ROLE_GUEST:
            case BaseUser::ROLE_PP:
                return 0;
            case BaseUser::ROLE_DEALER:
                return 1;
            case BaseUser::ROLE_SPECIALIST:
                return 2;
        }
    }
    /**
     * Receiving username of the current user.
     *
     * @return array|mixed|null
     */
    public function getUsername()
    {
        if ($user = $this->getModel()) {
            return $user->username;
        }
    }

    /**
     * Data acquisition from base
     *
     * @return CActiveRecord|null
     */
    private function getModel()
    {
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = BaseUser::model()->findByPk($this->id, array('select' => 'username, role'));
        }
        return $this->_model;
    }
}