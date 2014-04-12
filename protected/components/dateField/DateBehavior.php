<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class DateBehavior extends CActiveRecordBehavior
{
    public $publicFormat = 'd.m.Y';
    public $baseFormat = 'Y-m-d';

    public function beforeSave($event)
    {
        /**@var $model IDateContainable */
        $model = $this->getOwner();
        foreach ($model->getDateFields() as $field) {
            if (isset($model->$field)) {
                $model->$field = date($this->baseFormat, strtotime($model->$field));
            }
        }
    }

    public function afterFind($event)
    {
        /**@var $model IDateContainable */
        $model = $this->getOwner();
        foreach ($model->getDateFields() as $field) {
            $model->$field = date($this->publicFormat, strtotime($model->$field));
        }
    }

    public function afterSave($event)
    {
        /**@var $model IDateContainable */
        $model = $this->getOwner();
        foreach ($model->getDateFields() as $field) {
            $model->$field = date($this->publicFormat, strtotime($model->$field));
        }
    }
}