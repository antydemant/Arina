<?php
Yii::import('core.helpers.BitHelper');
/**
 * Convert bit fields
 * before save to bit view and
 * after find to array view
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class BitBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        /**@var $model IBitContainable */
        $model = $this->getOwner();
        foreach ($model->getBitFields() as $field) {
            $model->$field = BitHelper::arrayToBin($model->$field);
        }
    }

    public function afterFind($event)
    {
        /**@var $model IBitContainable */
        $model = $this->getOwner();
        foreach ($model->getBitFields() as $field) {
            $model->$field = BitHelper::binToArray($model->$field);
        }
    }

    public function afterSave($event)
    {
        /**@var $model IBitContainable */
        $model = $this->getOwner();
        foreach ($model->getBitFields() as $field) {
            $model->$field = BitHelper::binToArray($model->$field);
        }
    }
}