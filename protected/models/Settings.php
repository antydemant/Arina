<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $id
 * @property string $key
 * @property string $title
 * @property string $value
 */

class Settings extends ActiveRecord
{
    protected static $values;

    public static function getValue($key)
    {
        if (isset(self::$values[$key])) {
            return self::$values[$key];
        } else {
            /** @var Settings $model */
            $model = self::model()->findByAttributes(array('key'=>$key));
            if ($model===null) {
                throw new CHttpException(404, Yii::t('error', 'No content for this key'));
            }
            return self::$values[$model->key] = $model->value;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Settings the static model class
     */
    public static function model($className = __CLASS__)
    {
        if (!isset(self::$values)) {
            self::$values = array();
        }
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'settings';
    }

    /**
     * @return array validation rules for model attributes.
     */
//    public function enabled($sw)
//    {
//        if ($sw == 'false')
//
//    }

    public function rules()
    {

        return array(
            array('key, title, value', 'length', 'max' => 255),
            array('key', 'unique'),
            array('key', 'required'),
            array('title', 'required'),
            array('value', 'required'),
            array('id, key, title, value', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'key' => Yii::t('settings', 'key'),
            'title' => Yii::t('settings', 'title'),
            'value' => Yii::t('settings', 'value'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('key', $this->key, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}
