<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class PlanController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = StudyPlan::model()->getProvider();

        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionCreate()
    {
        $model = new StudyPlan('create');

        if (isset($_POST['StudyPlan'])) {
            $model->attributes = $_POST['StudyPlan'];
            $model->created = date('Y-m-d', time());
            if (isset(Yii::app()->session['weeks'])) {
                $model->semesters = Yii::app()->session['weeks'];
                unset(Yii::app()->session['weeks']);
            }
            if (isset(Yii::app()->session['graph'])) {
                $model->graph = Yii::app()->session['graph'];
                unset(Yii::app()->session['graph']);
            }
            if ($model->save()) {
                if (isset($_POST['origin'])) {
                    $this->copyPlan(StudyPlan::model()->loadContent($_POST['origin']), $model);
                }
                $this->redirect($this->createUrl('subjects', array('id' => $model->id)));
            }
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * Копіює предмети з одного плану в інший
     * @param StudyPlan $origin
     * @param StudyPlan $newPlan
     */
    public function copyPlan($origin, $newPlan)
    {
        foreach ($origin->subjects as $subject) {
            $model = new StudySubject();
            $model->attributes = $subject->attributes;
            $model->plan_id = $newPlan->id;
            $model->save(false);
        }
    }

    public function actionExecuteGraph()
    {
        if (isset($_POST['graph'])) {
            $semesters = array();
            $g = $_POST['graph'];
            foreach ($g as $i => $v) {
                $findFirst = false;
                $findSecond = false;
                $counter = 0;
                foreach ($v as $j) {
                    if ($j == 'T') $counter++;
                    if ($j == ' ') break;
                    if (($j != 'T')&&($j != 'P') && (!$findFirst)) {
                        $findFirst = true;
                        $semesters[$i + 1][1] = $counter;
                        $counter = 0;
                    } elseif (($j == 'T') && ($findFirst)) {
                        $findSecond = true;
                    } elseif (($j != 'T')&&($j != 'P') && ($findSecond)) {
                        $semesters[$i + 1][2] = $counter;
                        break;
                    }
                }
            }
        }
        $weeks = array();
        foreach ($semesters as $course)
            foreach ($course as $week)
                $weeks[] = $week;
        Yii::app()->session['weeks'] = $weeks;
        Yii::app()->session['graph'] = $_POST['graph'];
        $this->renderPartial('semestersPlan', array('data' => $semesters));
    }

    public function actionSubjects($id)
    {
        $model = new StudySubject();
        $model->plan_id = $id;

        if (isset($_POST['StudySubject'])) {
            $model->attributes = $_POST['StudySubject'];
            if ($model->save()) {
                $model = new StudySubject();
                $model->plan_id = $id;
            }
        }
        /**@var $plan StudyPlan */
        $plan = StudyPlan::model()->findByPk($id);
        $this->render('subjects', array('model' => $model, 'speciality_id' => $plan->speciality_id));
    }

    public function actionView($id)
    {
        $model = StudyPlan::model()->loadContent($id);

        $this->render('view', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = StudyPlan::model()->loadContent($id);

        if (isset($_POST['StudyPlan'])) {
            $model->attributes = $_POST['StudyPlan'];
            if (isset(Yii::app()->session['weeks'])) {
                $model->semesters = Yii::app()->session['weeks'];
                unset(Yii::app()->session['weeks']);
            }
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array('model' => $model));

    }

    public function actionEditSubject($id)
    {
        /** @var StudySubject $model */
        $model = StudySubject::model()->loadContent($id);

        if (isset($_POST['StudySubject'])) {
            $model->attributes = $_POST['StudySubject'];
            if ($model->save())
                $this->redirect($this->createUrl('view', array('id' => $model->plan_id)));
        }

        $this->render('edit_subject', array('model' => $model));
    }

    public function actionDeleteSubject($id)
    {
        StudySubject::model()->loadContent($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    public function actionMakeExcel($id)
    {
        /**@var $excel ExcelMaker */
        $excel = Yii::app()->getComponent('excel');
        $plan = StudyPlan::model()->loadContent($id);
        $excel->getDocument($plan, 'studyPlan');
    }

    public function actionDelete($id)
    {
        StudyPlan::model()->loadContent($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
} 