<?php
/**
 * Permission of standard CWebUser.
 *..
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

    public function getMainMenu()
    {

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