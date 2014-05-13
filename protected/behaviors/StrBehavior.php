<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class StrBehavior extends CActiveRecordBehavior
{
    public $fields = array();

    public function beforeSave($event)
    {
        $model = $this->getOwner();
        foreach ($this->fields as $field) {
            if (isset($model->$field)) {
                $model->$field = implode('|', $model->$field);
            }
        }
    }

    public function afterFind($event)
    {
        $model = $this->getOwner();
        foreach ($this->fields as $field) {
            $model->$field = empty($model->$field) ? array() : explode('|', $model->$field);
        }
    }

    public function afterSave($event)
    {
        $model = $this->getOwner();
        foreach ($this->fields as $field) {
            $model->$field = explode('|', $model->$field);
        }
    }
}