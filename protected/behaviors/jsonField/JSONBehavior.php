<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class JSONBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        /**@var $model IJSONContainable */
        $model = $this->getOwner();
        foreach ($model->getJSONFields() as $field) {
            if (isset($model->$field)) {
                $model->$field =  CJSON::encode($model->$field);
            }
        }
    }

    public function afterFind($event)
    {
        /**@var $model IJSONContainable */
        $model = $this->getOwner();
        foreach ($model->getJSONFields() as $field) {
            $model->$field = empty($model->$field) ? array() : CJSON::decode($model->$field);
        }
    }

    public function afterSave($event)
    {
        /**@var $model IJSONContainable */
        $model = $this->getOwner();
        foreach ($model->getJSONFields() as $field) {
            $model->$field = empty($model->$field) ? array() : CJSON::decode($model->$field);
        }
    }
}