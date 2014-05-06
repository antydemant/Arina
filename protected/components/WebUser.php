<?php
/**
 * Permission of standard CWebUser.
 *
 */
class WebUser extends CWebUser
{
    /**
     * @var null flowing values for result of model
     */
    private $_model = null;

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
            $this->_model = User::model()->findByAttributes(array('id' => $this->id), array('select' => 'username, role, id'));
        }
        return $this->_model;
    }

    public function getMainMenu()
    {
        $menu = array();
        switch ($this->getRole()) {
            case User::ROLE_GUEST:
                require_once('menu/guest.php');
                break;
            case User::ROLE_ADMIN:
                require_once('menu/admin.php');
                break;
            default:
                break;
        }
        return $menu;
    }

    /**
     * @return int
     */
    function getRole()
    {
        /**
         * @var User $user
         */
        if ($user = $this->getModel()) {
            return $user->role;
        }
        return User::ROLE_GUEST;
    }
}