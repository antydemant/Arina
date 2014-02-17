<?php

class m140217_164058_fill_audiences_data extends CDbMigration
{
	public function up()
	{
        $this->insert(
          'audience',
            array(
                'number'=>'111',
                'type'=>Audience::TYPE_LECTURE,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'133',
                'type'=>Audience::TYPE_LECTURE,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'247',
                'type'=>Audience::TYPE_LECTURE,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'139',
                'type'=>Audience::TYPE_LECTURE,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'139a',
                'type'=>Audience::TYPE_LECTURE,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'136',
                'type'=>Audience::TYPE_LECTURE,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'211',
                'type'=>Audience::TYPE_WORKSHOP,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'101',
                'type'=>Audience::TYPE_WORKSHOP,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'245',
                'type'=>Audience::TYPE_LABORATORY,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'244a',
                'type'=>Audience::TYPE_LABORATORY,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'231',
                'type'=>Audience::TYPE_LABORATORY,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'232',
                'type'=>Audience::TYPE_LABORATORY,
            )
        );
        $this->insert(
            'audience',
            array(
                'number'=>'235',
                'type'=>Audience::TYPE_LABORATORY,
            )
        );
	}

	public function down()
	{
        $this->truncateTable('audience');
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