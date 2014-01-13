<?php
/**
 * The followings are the available columns in table 'mark':
 * @property integer $id
 * @property integer $student_id
 * @property integer $load_id
 * @property integer $value
 * @property date $date
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class Mark extends ActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Mark the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'mark';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('student_id, load_id, value', 'required'),
            array('value', 'numerical', 'integerOnly' => true),
        );
    }

}