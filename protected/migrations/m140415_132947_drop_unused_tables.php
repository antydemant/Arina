<?php

class m140415_132947_drop_unused_tables extends CDbMigration
{
	public function up()
	{
        if (Yii::app()->getDb()->schema->getTable('study_plan') !== null) {
            $this->dropTable('study_plan');
        }
        if (Yii::app()->getDb()->schema->getTable('study_plan') !== null) {
            $this->dropTable('study_plan');
        }
        if (Yii::app()->getDb()->schema->getTable('study_plan_subject') !== null) {
            $this->dropTable('study_plan_subject');
        }

	}

	public function down()
	{
		echo "m140415_132947_drop_unused_tables does not support migration down.\n";
		return false;
	}
}