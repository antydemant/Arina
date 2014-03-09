<?php
/**
 * Is the customized base ActiveRecord class. Extended from CActiveRecord
 * All model ActiveRecord classes for this application should extend from this class.
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 *
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ActiveRecord extends CActiveRecord
{
    /**
     * Load content to model by PK
     *
     * @param $id value key
     * @param string $key primary key
     * @return array|CActiveRecord|mixed|null
     *
     * @throws CHttpException if the current id is not search.
     */
    public function loadContent($id, $key = 'id')
    {
        $criteria = new CDbCriteria;
        $criteria->condition = "$key=:value";
        $criteria->params = array(':value' => $id);

        if ($this->exists($criteria) == 0) {
            throw new CHttpException(404, Yii::t('error', 'No content for this key'));
        } else {
            return $this->find($criteria);
        }
    }

    /**
     * @param null $config
     * @return CActiveDataProvider
     */
    public function getProvider($config = null)
    {
        if ($config === null) {
            return new CActiveDataProvider($this);
        } else {
            return new CActiveDataProvider($this, $config);
        }
    }

    /**
     * Get list all records to model
     *
     * @param string $key key to array
     * @param string $value value to array
     * @return array ListData to dropDownListRow
     */
    public static function getListAll($key, $value = null)
    {
        if (is_null($value)) {
            $value = $key;
        }
        $criteria = new CDbCriteria();
        $criteria->select = array('id', $value);
        return CHtml::listData(static::model()->findAll($criteria), $key, $value);
    }


}
