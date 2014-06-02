<?php

/**
 * This is the model class for table "cyclic_commission".
 *
 * The followings are the available columns in table 'cyclic_commission':
 * @property integer $id
 * @property string $title
 * @property integer $head_id
 *
 * The followings are the available model relations:
 * @property Teacher[] $teachers
 * @property Teacher $head
 */
class CyclicCommission extends ActiveRecord
{
    public $headName;

    /**
     * @return array for dropDownList
     */
    public static function getList()
    {
        return CHtml::listData(self::model()->findAll(), 'id', 'title');
    }

    public function getHeadName()
    {
        if (isset($this->head)) {
            return $this->head->getFullName();
        } else {
            return Yii::t('base', 'Not selected');
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CyclicCommission the static model class
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
        return 'cyclic_commission';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('title', 'required'),
            array('head_id', 'required', 'on'=>'update'),
            array('head_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 40),
            array('id, title, head_id, head_search', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'teachers' => array(self::HAS_MANY, 'Teacher', 'cyclic_commission_id', 'order'=>'last_name, first_name, middle_name ASC'),
            'head' => array(self::BELONGS_TO, 'Teacher', 'head_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => Yii::t('terms', 'Title'),
            'head_id' => Yii::t('terms', 'Head'),
            'headName' => Yii::t('terms', 'Head'),
            'teachers'=>Yii::t('terms', 'Teachers'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('title', $this->title, true);
        $criteria->compare("head.first_name", $this->headName, true );
        $sort = new CSort();
        $sort->attributes = array(
            'headName' => array(
                'asc'=>'head.last_name, head.first_name, head.middle_name ',
                'desc'=>'head.last_name DESC, head.first_name DESC, head.middle_name DESC',
            ),
            'title',
        );
        $criteria->with = array('head');
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort'=>$sort,
        ));
    }

    private $head_old;

    protected function afterFind() {
        $this->head_old = $this->head_id;
        return parent::afterFind();
    }

    protected function beforeSave() {

        if ($this->head_id != $this->head_old) {
            $auth = Yii::app()->authManager;
            $head_old_user = User::model()->findByAttributes(
                array(
                    'identity_id'=>$this->head_old,
                    'identity_type'=>User::TYPE_TEACHER
                )
            );
            $head_new_user = User::model()->findByAttributes(
                array(
                    'identity_id'=>$this->head_id,
                    'identity_type'=>User::TYPE_TEACHER
                )
            );
            if (isset($head_old_user)) {
                $auth->revoke('cychead', $head_old_user->getAttribute('id'));
            }
            if (isset($head_new_user)) {
                $auth->assign('cychead', $head_new_user->getAttribute('id'));
            }
        }

        return parent::beforeSave();
    }
}
