<?php

class m140608_103713_add_dual_fields_to_work extends CDbMigration
{
    public function up()
    {
        $this->addColumn('wp_subject', 'dual_practice', 'bool');
        $this->addColumn('wp_subject', 'dual_labs', 'bool');
    }

    public function down()
    {
        $this->dropColumn('wp_subject', 'dual_practice');
        $this->dropColumn('wp_subject', 'dual_labs');
        return true;
    }
}