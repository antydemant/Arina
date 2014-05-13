<?php

class SiteController extends Controller
{
    public $name = 'Home';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionTest()
    {
        $this->render('test');
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function accessRules()
    {
        return CMap::mergeArray(
            array(
                array('allow',
                    'actions' => array('index'),
                    'users' => array('*'),
                ),
            ),
            parent::accessRules()
        );
    }

    protected static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /*
     * Операція "Що попові можна, то дякові - зась"
     */

    public function actionSetup() {
        $auth = Yii::app()->authManager;

        /*
         * -----------------------------+---------------------------+---------------------------+
         * Groups                       | Audiences                 | Teachers                  |
         *  C: Dep head                 |  C: Admin                 |  C: Dep head              |
         *  R: All                      |  R: All                   |  R: All                   |
         *  U: Dep head, Curator        |  U: Admin                 |  U: Dep head              |
         *  D: Dep head                 |  D: Admin                 |  D: Dep head              |
         * -----------------------------+---------------------------+---------------------------|
         * Cyclic commissions           | Study plans               | Loads                     |
         *  C: Dep head                 |  C: Dep head              |  C: Dep head, Cycle head  |
         *  R: All                      |  R: Dep head, Cycle head  |  R: All                   |
         *  U: Dep head                 |  U: Dep head              |  U: Dep head, Cycle head  |
         *  D: Dep head                 |  D: Dep head              |  D: Dep head, Cycle head  |
         * -----------------------------+---------------------------+---------------------------|
         * Students                     | Specialities              | Departments               |
         *  C: Dep head                 |  C: Dep head              |  C: Admin                 |
         *  R: All                      |  R: All                   |  R: All                   |
         *  U: Dep head, Curator        |  U: Dep head              |  U: Admin                 |
         *  D: Dep head                 |  D: Dep head              |  D: Admin                 |
         * -----------------------------+---------------------------+---------------------------|
         * Subjects                     | Subject cycles            | Exemptions                |
         *  C: Dep head                 |  C: Dep head              |  C: Admin                 |
         *  R: All                      |  R: All                   |  R: All                   |
         *  U: Dep head                 |  U: Dep head              |  U: Admin                 |
         *  D: Dep head                 |  D: Dep head              |  D: Admin                 |
         * -------------------------------------------------------------------------------------|
         * Marks/Absences/Actual classes                                                        |
         *  C: Teacher, Prefect                                                                 |
         *  R: Student (own), Teacher (own), Curator (own group), Dep head (own department)     |
         *  U: Teacher, Prefect                                                                 |
         *  D: Teacher                                                                          |
         * -------------------------------------------------------------------------------------+
         *
         *  60 access rules
         *
         *  7 roles:
         *      Admin
         *      Dep head
         *      Cycle head
         *      Curator
         *      Teacher
         *      Prefect
         *      Student
         *
         * Schedule?
         */

        /*
         * Operations
         */

        /* CRUD Operations */

        // Groups
        $auth->createOperation('createGroup','create a group');
        $auth->createOperation('readGroup','read a group');
        $auth->createOperation('updateGroup','update a group');
        $auth->createOperation('deleteGroup','delete a group');

        // Audiences
        $auth->createOperation('createAudience','create an audience');
        $auth->createOperation('readAudience','read an audience');
        $auth->createOperation('updateAudience','update an audience');
        $auth->createOperation('deleteAudience','delete an audience');

        // Teachers
        $auth->createOperation('createTeacher','create a teacher');
        $auth->createOperation('readTeacher','read a teacher');
        $auth->createOperation('updateTeacher','update a teacher');
        $auth->createOperation('deleteTeacher','delete a teacher');

        // Cyclic commissions
        $auth->createOperation('createCyclicCommission','create a cyclic commission');
        $auth->createOperation('readCyclicCommission','read an cyclic commission');
        $auth->createOperation('updateCyclicCommission','update a cyclic commission');
        $auth->createOperation('deleteCyclicCommission','delete a cyclic commission');

        // Study plans
        $auth->createOperation('createStudyPlan','create a study plan');
        $auth->createOperation('readStudyPlan','read a study plan');
        $auth->createOperation('updateStudyPlan','update a study plan');
        $auth->createOperation('deleteStudyPlan','delete a study plan');

        // Loads
        $auth->createOperation('createLoad','create a load');
        $auth->createOperation('readLoad','read a load');
        $auth->createOperation('updateLoad','update a load');
        $auth->createOperation('deleteLoad','delete a load');

        // Students
        $auth->createOperation('createStudent','create a group');
        $auth->createOperation('readStudent','read a group');
        $auth->createOperation('updateStudent','update a group');
        $auth->createOperation('deleteStudent','delete a group');

        // Specialities
        $auth->createOperation('createSpeciality','create a speciality');
        $auth->createOperation('readSpeciality','read a speciality');
        $auth->createOperation('updateSpeciality','update a speciality');
        $auth->createOperation('deleteSpeciality','delete a speciality');

        // Departments
        $auth->createOperation('createDepartment','create a department');
        $auth->createOperation('readDepartment','read a department');
        $auth->createOperation('updateDepartment','update a department');
        $auth->createOperation('deleteDepartment','delete a department');

        // Subjects
        $auth->createOperation('createSubject','create a subject');
        $auth->createOperation('readSubject','read a subject');
        $auth->createOperation('updateSubject','update a subject');
        $auth->createOperation('deleteSubject','delete a subject');

        // Subject cycles
        $auth->createOperation('createSubjectCycle','create a subject cycle');
        $auth->createOperation('readSubjectCycle','read a subject cycle');
        $auth->createOperation('updateSubjectCycle','update a subject cycle');
        $auth->createOperation('deleteSubjectCycle','delete a subject cycle');

        // Exemptions
        $auth->createOperation('createExemption','create an exemption');
        $auth->createOperation('readExemption','read an exemption');
        $auth->createOperation('updateExemption','update an exemption');
        $auth->createOperation('deleteExemption','delete an exemption');

        // Marks / Absences / Classes
        $auth->createOperation('createMAC','create a MAC item');
        $auth->createOperation('readMAC','read a MAC item');
        $auth->createOperation('updateMAC','update a MAC item');
        $auth->createOperation('deleteMAC','delete a MAC item');

        /* To do: Misc operations */

        /*
         * Tasks
         */


        $task=$auth->createTask('manageGroup','description');
            $task->addChild('createGroup');
            $task->addChild('readGroup');
            $task->addChild('updateGroup');
            $task->addChild('deleteGroup');
        $task=$auth->createTask('manageAudience','description');
            $task->addChild('createAudience');
            $task->addChild('readAudience');
            $task->addChild('updateAudience');
            $task->addChild('deleteAudience');
        $task=$auth->createTask('manageTeacher','description');
            $task->addChild('createTeacher');
            $task->addChild('readTeacher');
            $task->addChild('updateTeacher');
            $task->addChild('deleteTeacher');
        $task=$auth->createTask('manageCyclicCommission','description');
            $task->addChild('createCyclicCommission');
            $task->addChild('readCyclicCommission');
            $task->addChild('updateCyclicCommission');
            $task->addChild('deleteCyclicCommission');
        $task=$auth->createTask('manageStudyPlan','description');
            $task->addChild('createStudyPlan');
            $task->addChild('readStudyPlan');
            $task->addChild('updateStudyPlan');
            $task->addChild('deleteStudyPlan');
        $task=$auth->createTask('manageLoad','description');
            $task->addChild('createLoad');
            $task->addChild('readLoad');
            $task->addChild('updateLoad');
            $task->addChild('deleteLoad');
        $task=$auth->createTask('manageStudent','description');
            $task->addChild('createStudent');
            $task->addChild('readStudent');
            $task->addChild('updateStudent');
            $task->addChild('deleteStudent');
        $task=$auth->createTask('manageSpeciality','description');
            $task->addChild('createSpeciality');
            $task->addChild('readSpeciality');
            $task->addChild('updateSpeciality');
            $task->addChild('deleteSpeciality');
        $task=$auth->createTask('manageDepartment','description');
            $task->addChild('createDepartment');
            $task->addChild('readDepartment');
            $task->addChild('updateDepartment');
            $task->addChild('deleteDepartment');
        $task=$auth->createTask('manageSubject','description');
            $task->addChild('createSubject');
            $task->addChild('readSubject');
            $task->addChild('updateSubject');
            $task->addChild('deleteSubject');
        $task=$auth->createTask('manageSubjectCycle','description');
            $task->addChild('createSubjectCycle');
            $task->addChild('readSubjectCycle');
            $task->addChild('updateSubjectCycle');
            $task->addChild('deleteSubjectCycle');
        $task=$auth->createTask('manageExemption','description');
            $task->addChild('createExemption');
            $task->addChild('readExemption');
            $task->addChild('updateExemption');
            $task->addChild('deleteExemption');
        $task=$auth->createTask('manageMAC','description');
            $task->addChild('createMAC');
            $task->addChild('readMAC');
            $task->addChild('updateMAC');
            $task->addChild('deleteMAC');

        $task=$auth->createTask('manageOwnGroup','description' , 'return (Yii::app()->user->identityId==$params["id"] && Yii::app()->user->identityType==$params["type"]);');
            $task->addChild('manageGroup');
        $task=$auth->createTask('manageOwnMAC','description' , 'return Yii::app()->user->id==$params["Id"];');
            $task->addChild('manageMAC');
        $task=$auth->createTask('manageOwnLoad','description' , 'return Yii::app()->user->id==$params["Id"];');
            $task->addChild('manageLoad');
        $task=$auth->createTask('manageOwnStudyPlan','description' , 'return Yii::app()->user->id==$params["Id"];');
            $task->addChild('manageStudyPlan');
        $task=$auth->createTask('manageOwnCycleSubjects','description' , 'return Yii::app()->user->id==$params["Id"];');
            $task->addChild('manageSubject');
        $task=$auth->createTask('manageOwnStudent','description' , 'return Yii::app()->user->id==$params["Id"];');
            $task->addChild('manageStudent');

        $task=$auth->createTask('manageOwnSpeciality','description' , 'return (Yii::app()->user->identityId==$params["id"] && Yii::app()->user->identityType==$params["type"]);');
            $task->addChild('manageSpeciality');

        //$bizRule='return Yii::app()->user->id==$params["post"]->authID;';
        //$task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);
        //$task->addChild('updatePost');

        /*
         * Roles
         */

        //$role->addChild('name');

        $role=$auth->createRole('student');

        $role=$auth->createRole('prefect');
        $role->addChild('student');
        $role->addChild('manageOwnGroup');

        $role=$auth->createRole('teacher');
        $role->addChild('manageOwnGroup');

        $role=$auth->createRole('curator');
        $role->addChild('teacher');

        $role=$auth->createRole('cychead');
        $role->addChild('curator');

        $role=$auth->createRole('dephead');
        $role->addChild('cychead');
        $role->addChild('manageOwnSpeciality');

        $role=$auth->createRole('admin');
        $role->addChild('dephead');
        $role->addChild('manageSpeciality');
        $role->addChild('manageGroup');




        //$auth->assign('item','name');
        //$auth->revoke('item','name');

        $auth->assign('admin',1);
        $auth->assign('dephead',91);
        $auth->assign('curator',92);
        $auth->assign('teacher',93);
        $auth->assign('student',94);
        $auth->assign('prefect',95);


        if(Yii::app()->user->checkAccess('deletePost'))
        {

        }

        //$params=array('post'=>$post);
        //if(Yii::app()->user->checkAccess('updateOwnPost',$params))


        //$bizRule='return !Yii::app()->user->isGuest;';
        //$auth->createRole('authenticated', 'authenticated user', $bizRule);

        //$bizRule='return Yii::app()->user->name === "admin";';
        //$auth->createRole('admin', 'admin user', $bizRule);
        return;
    }
}