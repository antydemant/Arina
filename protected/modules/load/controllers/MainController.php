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

    public function actionView($id)
    {
        $dataProvider = Load::model()->getProvider(array('criteria' => array('condition' => 'study_year_id=' . $id)));
        $year = StudyYear::model()->loadContent($id);
        $this->render('view', array('dataProvider' => $dataProvider, 'year' => $year));
    }


    public function actionDelete($id)
    {

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
                    $fall = $course * 2 - 1;
                    $spring = $course * 2;
                    $group = Group::model()->find("title='$title'");
                    if (!empty($subject->total[$fall]) || !empty($subject->total[$spring])) {
                        $model = new Load();
                        $model->study_year_id = $year->id;
                        $model->wp_subject_id = $subject->id;
                        $model->group_id = $group->id;
                        $model->type = Load::TYPE_LECTURES;
                        $model->course = $course;
                        $model->save();
                        if ($subject->dual_practice &&
                            (!empty($subject->practs[$fall]) || !empty($subject->practs[$spring]))
                        ) {
                            $model = new Load();
                            $model->study_year_id = $year->id;
                            $model->wp_subject_id = $subject->id;
                            $model->group_id = $group->id;
                            $model->course = $course;
                            $model->type = Load::TYPE_PRACTS;
                            $model->save();
                        }
                        if ($subject->dual_labs &&
                            (!empty($subject->labs[$fall]) || !empty($subject->labs[$spring]))
                        ) {
                            $model = new Load();
                            $model->study_year_id = $year->id;
                            $model->wp_subject_id = $subject->id;
                            $model->course = $course;
                            $model->group_id = $group->id;
                            $model->type = Load::TYPE_LABS;
                            $model->save();
                        }
                    }
                }
            }
        }
    }

} 