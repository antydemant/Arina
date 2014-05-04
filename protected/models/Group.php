<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $title
 * @property integer $speciality_id
 * @property integer $curator_id
 * @property integer $monitor_id
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'speciality_id', 'curator_id', 'monitor_id'], 'required'],
            [['speciality_id', 'curator_id', 'monitor_id'], 'integer'],
            [['title'], 'string', 'max' => 8],
            [['title'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'speciality_id' => 'Speciality ID',
            'curator_id' => 'Curator ID',
            'monitor_id' => 'Monitor ID',
        ];
    }
}
