<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class StrBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        /**@var $model IStrContainable */
        $model = $this->getOwner();
        foreach ($model->getStrFields() as $field) {
            if (isset($model->$field)) {
                $model->$field = implode('|', $model->$field);
            }
        }
    }

    public function afterFind($event)
    {
        /**@var $model IStrContainable */
        $model = $this->getOwner();
        foreach ($model->getStrFields() as $field) {
            $model->$field = empty($model->$field) ? array() : explode('|', $model->$field);
        }
    }

    public function afterSave($event)
    {
        /**@var $model IStrContainable */
        $model = $this->getOwner();
        foreach ($model->getStrFields() as $field) {
            $model->$field = explode('|', $model->$field);
        }
    }
}