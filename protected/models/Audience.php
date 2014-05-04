<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "audience".
 *
 * @property integer $id
 * @property string $number
 * @property integer $type
 */
class Audience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'audience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'type'], 'required'],
            [['type'], 'integer'],
            [['number'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'type' => 'Type',
        ];
    }
}
