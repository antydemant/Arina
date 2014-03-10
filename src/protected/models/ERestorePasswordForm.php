<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class ERestorePasswordForm extends CFormModel
{
    public $email;

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'email' => Yii::t('base', 'E-mail'),
        );
    }

    /**
     * Validation rules
     * @return array
     */
    public function rules()
    {
        return array(
            // email are required
            array('email', 'required'),
            // email must be email)
            array('email', 'email'),
        );
    }
}