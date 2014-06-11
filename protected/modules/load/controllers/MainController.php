<?php
Yii::import('studyPlan.models.*');

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class MainController extends Controller
{
    public $name = 'Навантаження';

    public function actionIndex()
    {
        $dataProvider = StudyYear::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionCreate()
    {
        if (isset($_POST['study_year'])) {
            $this->generateLoadFor($_POST['study_year']);
            $this->redirect($this->createUrl('index'));
        }

        $this->render('create');
    }

    /**
     * @param integer $studyYear
     */
    protected function generateLoadFor($studyYear)
    {
        /** @var StudyYear $year */
        $year = StudyYear::model()->loadContent($studyYear);
        foreach ($year->workPlans as $plan) {
            $groups = $plan->speciality->getGroupsByStudyYear($year->id);
            foreach ($plan->subjects as $subject) {
                foreach ($groups as $title => $course) {
                    $spring = $course * 2;
                    $fall = $spring - 1;
                    $group = Group::model()->find("title='$title'");
                    if (!empty($subject->total[$fall]) || !empty($subject->total[$spring])) {
                        $this->getNewLoad($year, $subject, $group, $course, Load::TYPE_LECTURES);

                        if ($subject->dual_practice && (!empty($subject->practs[$fall]) || !empty($subject->practs[$spring]))) {
                            $this->getNewLoad($year, $subject, $group, $course, Load::TYPE_PRACTS);
                        }

                        if ($subject->dual_labs && (!empty($subject->labs[$fall]) || !empty($subject->labs[$spring]))) {
                            $this->getNewLoad($year, $subject, $group, $course, Load::TYPE_LABS);
                        }

                    }
                }
            }
        }
    }

    /**
     * @param StudyYear $studyYear
     * @param WorkSubject $subject
     * @param Group $group
     * @param int $course
     * @param int $type
     */
    protected function getNewLoad($studyYear, $subject, $group, $course, $type)
    {
        $model = new Load();
        $model->study_year_id = $studyYear->id;
        $model->wp_subject_id = $subject->id;
        $model->group_id = $group->id;
        $model->type = $type;
        $model->course = $course;
        $consult = array();
        $consult[0] = $model->getConsultation($course * 2 - 1);
        $consult[1] = $model->getConsultation($course * 2);
        $model->consult = $consult;
        $students = array();
        $students[0] = $group->getStudentsCount();
        $students[1] = $group->getBudgetStudentsCount();
        $students[2] = $group->getContractStudentsCount();
        $model->students = $students;
        $model->save();
    }

    public function actionView($id)
    {
        $model = new Load();

        if (isset($_GET['Load'])) {
            $model->attributes = $_GET['Load'];
            $model->commissionId = $_GET['Load']['commissionId'];
        }

        $year = StudyYear::model()->loadContent($id);
        $this->render('view', array('model'=>$model, 'dataProvider' => $model->search(), 'year' => $year));
    }

    public function actionGenerate($id)
    {
        $this->generateLoadFor($id);
        $this->redirect($this->createUrl('view', array('id' => $id)));
    }

} 