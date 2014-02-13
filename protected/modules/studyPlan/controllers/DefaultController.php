<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
}
/*
 * <?php

protected function beforeAction($action)
{
    return parent::beforeAction($action);
}

public function actionIndex()
{
    $provider = StudyPlan::model()->getProvider();
    $this->render(
        'index',
        array(
            'dataProvider' => $provider,
        )
    );
}

public function actionCreate()
{
    $model = new StudyPlan();

    $this->ajaxValidation('group-form', $model);

    if (isset($_POST['StudyPlan'])) {
        $model->attributes = $_POST['StudyPlan'];
        if ($model->save()) {
            $this->redirect(array('/studyPlan/semesters/' . $model->id));
        }
    }


    $this->render(
        'create',
        array(
            'model' => $model,
        )
    );
}

public function actionUpdateSemesters()
{
    $model = new StudyPlan();

    $this->render(
        'updateSemesters',
        array(
            'model' => $model,
        )
    );
}

public function actionSemesters($id)
{
    $params = array(
        'criteria' => array(
            'condition' => "study_plan_id =$id",
        ),
    );
    $dataProvider = StudyPlanInfo::model()->getProvider($params);

    $this->render(
        'semesters',
        array(
            'dataProvider' => $dataProvider,
        )
    );
}

public function actionDelete($id)
{
    $model = StudyPlan::model()->loadContent($id);
    if ($model->delete() && $model->save()) {
        $this->redirect(array('studyPlan/index'));
    }

}
}*/