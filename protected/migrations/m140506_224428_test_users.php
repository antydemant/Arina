<?php

class m140506_224428_test_users extends CDbMigration
{
    public function up()
    {
        $this->insert('user', array('username' => 'testdephead1', 'role' => 1,
            'identity_id' => 3, 'identity_type' => 1, 'password' => 'c4ca4238a0b923820dcc509a6f75849b'));
        $this->insert('user', array('username' => 'testcurator1', 'role' => 1,
            'identity_id' => 1, 'identity_type' => 1, 'password' => 'c4ca4238a0b923820dcc509a6f75849b'));
        $this->insert('user', array('username' => 'testteacher1', 'role' => 1,
            'identity_id' => 4, 'identity_type' => 1, 'password' => 'c4ca4238a0b923820dcc509a6f75849b'));
        $this->insert('user', array('username' => 'teststudent1', 'role' => 1,
            'identity_id' => 1, 'identity_type' => 2, 'password' => 'c4ca4238a0b923820dcc509a6f75849b'));
        $this->insert('user', array('username' => 'testprefect1', 'role' => 1,
            'identity_id' => 7, 'identity_type' => 2, 'password' => 'c4ca4238a0b923820dcc509a6f75849b'));
    }

    public function down()
    {
        $this->truncateTable('user');
        return true;
    }

}