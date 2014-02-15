<?php

class m140215_185957_user_root_1_insert extends CDbMigration
{
    public function up()
    {
        $this->insert(
            'user',
            array(
                'username' => 'root',
                'password' => 'c4ca4238a0b923820dcc509a6f75849b',
                'email' => 'root@email.com',
                'role' => '1',
            )
        );
    }

    public function down()
    {
        $this->delete(
            'user',
            array(
                'username' => 'root',
            )
        );
        return false;
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}