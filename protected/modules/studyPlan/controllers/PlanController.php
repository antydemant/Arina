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
            if ($model->save()) {
                $this->redirect($this->createUrl('subjects', array('id' => $model->id)));
            }
        }

        $this->render('create', array('model' => $model));
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
                    if (($j != 'T') && (!$findFirst)) {
                        $findFirst = true;
                        $semesters[$i + 1][1] = $counter;
                        $counter = 0;
                    } elseif (($j == 'T') && ($findFirst)) {
                        $findSecond = true;
                    } elseif (($j != 'T') && ($findSecond)) {
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

        $this->render('update', array('model' => $model));

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
        if (isset($_GET['subjects'])) {
            foreach ($_GET['subjects'] as $subject_id)
                StudySubject::model()->findByPk($subject_id)->delete();
        } else {
            StudyPlan::model()->loadContent($id)->delete();
        }
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));

    }
} 