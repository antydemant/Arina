<?php

class m140511_132916_add_graph_field extends CDbMigration
{
    public function up()
    {
        $this->addColumn('sp_plan', 'graph', 'text');
    }

    public function down()
    {
        $this->dropColumn('sp_plan', 'graph');
        return true;
    }

}