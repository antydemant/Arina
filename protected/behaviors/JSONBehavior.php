<?php
/**
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class JSONBehavior extends CActiveRecordBehavior
{
    public $fields = array();

    public function beforeSave($event)
    {
        $model = $this->getOwner();
        foreach ($this->fields as $field) {
            if (isset($model->$field)) {
                $model->$field =  CJSON::encode($model->$field);
            }
        }
    }

    public function afterFind($event)
    {
        $model = $this->getOwner();
        foreach ($this->fields as $field) {
            $model->$field = empty($model->$field) ? array() : CJSON::decode($model->$field);
        }
    }

    public function afterSave($event)
    {
        $model = $this->getOwner();
        foreach ($this->fields as $field) {
            $model->$field = empty($model->$field) ? array() : CJSON::decode($model->$field);
        }
    }
}