<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $role
 * @property integer $identity_id
 * @property integer $identity_type
 */
class User extends ActiveRecord
{
    const ROLE_GUEST = 0;
    const ROLE_ADMIN = 1;
    const ROLE_TEACHER = 2;
    const ROLE_STUDENT = 3;
    const ROLE_PREFECT = 4;
    const ROLE_CURATOR = 5;
    const ROLE_DEPARTMENT_HEAD = 6;
    const ROLE_ROOT = 7;

    const TYPE_SUPER = 0;
    const TYPE_TEACHER = 1;
    const TYPE_STUDENT = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    public static function getRoleList()
    {
        return array(
            self::ROLE_GUEST => Yii::t('user', 'Guest'),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, email', 'required'),
            array('role, identity_id', 'numerical', 'integerOnly' => true),
            array('username, password, email', 'length', 'max' => 255),
            array('username, email', 'unique'),
            array('email', 'email'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, password, email, role, identity_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'role' => 'Role',
            'identity_id' => 'Identity',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('role', $this->role);
        $criteria->compare('identity_id', $this->identity_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    //IMPORTANT THINGAMAJIG

    public function afterSave() {
        if (!Yii::app()->authManager->isAssigned(
            $this->role,$this->id)) {
            Yii::app()->authManager->assign($this->type,
                $this->id);
        }
        return parent::afterSave();
    }

}