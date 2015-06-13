<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class ERestorePasswordForm extends CFormModel
{
    public $username;

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'username' => "Ім'я користувача",
        );
    }

    /**
     * Validation rules
     * @return array
     */
    public function rules()
    {
        return array(
            array('username', 'required'),
        );
    }
}