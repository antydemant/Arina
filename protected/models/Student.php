<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $code
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property integer $group_id
 * @property string $phone_number
 * @property string $mobile_number
 * @property string $mother_name
 * @property string $father_name
 * @property string $gender
 * @property string $official_address
 * @property string $characteristics
 * @property string $factual_address
 * @property string $birth_date
 * @property string $admission_date
 * @property string $tuition_payment
 * @property integer $admission_order_number
 * @property integer $admission_semester
 * @property string $entry_exams
 * @property string $education_document
 * @property string $contract
 * @property integer $math_mark
 * @property integer $ua_language_mark
 * @property string $mother_workplace
 * @property string $mother_position
 * @property string $mother_workphone
 * @property string $mother_boss_workphone
 * @property string $father_workplace
 * @property string $father_position
 * @property string $father_workphone
 * @property string $father_boss_workphone
 * @property integer $graduated
 * @property string $graduation_date
 * @property string $graduation_basis
 * @property integer $graduation_semester
 * @property integer $graduation_order_number
 * @property string $diploma
 * @property string $direction
 * @property string $misc_data
 * @property string $hobby
 *
 *
 * @property Exemption[] $exemptions
 * @property Group $group
 * @property ClassMark[] $marks
 * @property ClassAbsence[] $absences
 */
class Student extends ActiveRecord
{
    public $classes = array();

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Student the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function behaviors()
    {
        return array(
            'CAdvancedArBehavior' => array(
                'class' => 'application.extensions.CAdvancedArBehavior')
        );
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'student';
    }

    public function getFullName()
    {
        return "$this->last_name $this->first_name $this->middle_name";
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('code, last_name, first_name, middle_name, group_id', 'required'),
            array('group_id, admission_order_number, admission_semester, math_mark, ua_language_mark, graduated, graduation_semester, graduation_order_number', 'numerical', 'integerOnly' => true),
            array('code', 'length', 'max' => 12),
            array('last_name, first_name, middle_name', 'length', 'max' => 40),
            array('phone_number, mobile_number', 'length', 'max' => 15),
            array('mother_name, father_name', 'length', 'max' => 60),
            array('gender', 'length', 'max' => 10),
            array('official_address', 'length', 'max' => 200),
            array('factual_address, entry_exams, misc_data, hobby', 'length', 'max' => 100),
            array('tuition_payment, education_document, contract, mother_workplace, mother_position, father_workplace, father_position, graduation_basis, diploma, direction', 'length', 'max' => 50),
            array('mother_workphone, mother_boss_workphone, father_workphone, father_boss_workphone', 'length', 'max' => 20),
            array('characteristics, birth_date, admission_date, graduation_date, exemptions', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, last_name, first_name, middle_name, group_id, phone_number, mobile_number, mother_name, father_name, gender, official_address, characteristics, factual_address, birth_date, admission_date, tuition_payment, admission_order_number, admission_semester, entry_exams, education_document, contract, math_mark, ua_language_mark, mother_workplace, mother_position, mother_workphone, mother_boss_workphone, father_workplace, father_position, father_workphone, father_boss_workphone, graduated, graduation_date, graduation_basis, graduation_semester, graduation_order_number, diploma, direction, misc_data, hobby', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
            'marks' => array(self::HAS_MANY, 'ClassMark', 'student_id'),
            'absences' => array(self::HAS_MANY, 'ClassAbsence', 'student_id'),
            'exemptions' => array(self::MANY_MANY, 'Exemption', 'student_has_exemption(student_id, exemption_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('student', 'ID'),
            'code' => Yii::t('student', 'Code'),
            'last_name' => Yii::t('student', 'Last Name'),
            'first_name' => Yii::t('student', 'First Name'),
            'middle_name' => Yii::t('student', 'Middle Name'),
            'group_id' => Yii::t('student', 'Group'),
            'phone_number' => Yii::t('student', 'Phone Number'),
            'mobile_number' => Yii::t('student', 'Mobile Number'),
            'mother_name' => Yii::t('student', 'Mother Name'),
            'father_name' => Yii::t('student', 'Father Name'),
            'gender' => Yii::t('student', 'Gender'),
            'official_address' => Yii::t('student', 'Official Address'),
            'characteristics' => Yii::t('student', 'Characteristics'),
            'factual_address' => Yii::t('student', 'Factual Address'),
            'birth_date' => Yii::t('student', 'Birth Date'),
            'admission_date' => Yii::t('student', 'Admission Date'),
            'tuition_payment' => Yii::t('student', 'Tuition Payment'),
            'admission_order_number' => Yii::t('student', 'Admission Order Number'),
            'admission_semester' => Yii::t('student', 'Admission Semester'),
            'entry_exams' => Yii::t('student', 'Entry Exams'),
            'education_document' => Yii::t('student', 'Education Document'),
            'contract' => Yii::t('student', 'Contract'),
            'math_mark' => Yii::t('student', 'Math Mark'),
            'ua_language_mark' => Yii::t('student', 'Ua Language Mark'),
            'mother_workplace' => Yii::t('student', 'Mother Workplace'),
            'mother_position' => Yii::t('student', 'Mother Position'),
            'mother_workphone' => Yii::t('student', 'Mother Workphone'),
            'mother_boss_workphone' => Yii::t('student', 'Mother Boss Workphone'),
            'father_workplace' => Yii::t('student', 'Father Workplace'),
            'father_position' => Yii::t('student', 'Father Position'),
            'father_workphone' => Yii::t('student', 'Father Workphone'),
            'father_boss_workphone' => Yii::t('student', 'Father Boss Workphone'),
            'graduated' => Yii::t('student', 'Graduated'),
            'graduation_date' => Yii::t('student', 'Graduation Date'),
            'graduation_basis' => Yii::t('student', 'Graduation Basis'),
            'graduation_semester' => Yii::t('student', 'Graduation Semester'),
            'graduation_order_number' => Yii::t('student', 'Graduation Order Number'),
            'diploma' => Yii::t('student', 'Diploma'),
            'direction' => Yii::t('student', 'Direction'),
            'misc_data' => Yii::t('student', 'Misc Data'),
            'hobby' => Yii::t('student', 'Hobby'),
            'exemptions' => Yii::t('student', 'Exemptions'),
            'fullName' => Yii::t('terms', 'Full name'),
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
        $criteria->compare('code', $this->code, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('phone_number', $this->phone_number, true);
        $criteria->compare('mobile_number', $this->mobile_number, true);
        $criteria->compare('mother_name', $this->mother_name, true);
        $criteria->compare('father_name', $this->father_name, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('official_address', $this->official_address, true);
        $criteria->compare('characteristics', $this->characteristics, true);
        $criteria->compare('factual_address', $this->factual_address, true);
        $criteria->compare('birth_date', $this->birth_date, true);
        $criteria->compare('admission_date', $this->admission_date, true);
        $criteria->compare('tuition_payment', $this->tuition_payment, true);
        $criteria->compare('admission_order_number', $this->admission_order_number);
        $criteria->compare('admission_semester', $this->admission_semester);
        $criteria->compare('entry_exams', $this->entry_exams, true);
        $criteria->compare('education_document', $this->education_document, true);
        $criteria->compare('contract', $this->contract, true);
        $criteria->compare('math_mark', $this->math_mark);
        $criteria->compare('ua_language_mark', $this->ua_language_mark);
        $criteria->compare('mother_workplace', $this->mother_workplace, true);
        $criteria->compare('mother_position', $this->mother_position, true);
        $criteria->compare('mother_workphone', $this->mother_workphone, true);
        $criteria->compare('mother_boss_workphone', $this->mother_boss_workphone, true);
        $criteria->compare('father_workplace', $this->father_workplace, true);
        $criteria->compare('father_position', $this->father_position, true);
        $criteria->compare('father_workphone', $this->father_workphone, true);
        $criteria->compare('father_boss_workphone', $this->father_boss_workphone, true);
        $criteria->compare('graduated', $this->graduated);
        $criteria->compare('graduation_date', $this->graduation_date, true);
        $criteria->compare('graduation_basis', $this->graduation_basis, true);
        $criteria->compare('graduation_semester', $this->graduation_semester);
        $criteria->compare('graduation_order_number', $this->graduation_order_number);
        $criteria->compare('diploma', $this->diploma, true);
        $criteria->compare('direction', $this->direction, true);
        $criteria->compare('misc_data', $this->misc_data, true);
        $criteria->compare('hobby', $this->hobby, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function afterFind()
    {
        $list = array();
        foreach ($this->exemptions as $item) {
            $list[] = $item->id;
        }
        $this->exemptions = $list;
    }
}
