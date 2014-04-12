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

        $this->render('subjects', array('model' => $model));
    }

    public function actionView()
    {

    }

    public function actionUpdate()
    {

    }

    public function actionDelete()
    {

    }
} 