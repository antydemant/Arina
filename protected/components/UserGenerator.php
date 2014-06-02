<?php
Yii::import('application.models.User');
class UserGenerator {

    public static function genUsername()
    {
        $length = 9;
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $chars_length = strlen($chars);
        $username = "";
        for ( $i = 0; $i < $length; $i++ )
        {
            $username .= $chars[mt_rand(0, $chars_length-1)];
        }
        return $username;
    }

    public static function genPassword()
    {
        $length = 9;

        $lower = 'abcdefghijklmnopqrstuvwxyz';

        $lower_length = strlen($lower);

        $password = '';
        for ($i = 0; $i < $length; $i++)
        {
            $password .= $lower[mt_rand(0, $lower_length-1)];
        }
        return md5($password);
    }

    public static function generateUser($identityId, $identityType) {
        $user = new User;
        $user->identity_id = $identityId;
        $user->identity_type = $identityType;
        $user->username = UserGenerator::genUsername();
        while (User::model()->findByAttributes(array('username' => $user->username)) != null) {
            $user->username = UserGenerator::genUsername();
        }
        $user->password = UserGenerator::genPassword();
        $user->email = 'defaultmail@xpk.com';
        $user->role = 1;
        $user->save();
        return $user;
    }
} 