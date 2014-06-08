<?php

class m140608_092922_create_load_table extends CDbMigration
{
    public function up()
    {
        $this->dropTable('teacher_load');
        $this->createTable('load', array(
            'id' => 'pk',
            'study_year_id' => 'integer',
            'teacher_id' => 'integer',
            'group_id' => 'integer',
            'wp_subject_id' => 'integer',
            'projects_hours' => 'string',
            'type' => 'integer',
            'course' => 'integer',
        ));
    }

    public function down()
    {
        $this->dropTable('load');
        $this->execute(
            'CREATE TABLE IF NOT EXISTS `teacher_load` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `teacher_id` int(11) NOT NULL,
              `sp_hours_id` int(11) NOT NULL,
              `group_id` int(11) NOT NULL,
              `lectures` int(11) NOT NULL,
              `labs` int(11) NOT NULL,
              `practs` int(11) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2;
        ');
        return true;
    }

}