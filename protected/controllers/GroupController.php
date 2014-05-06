<?php

/**
 * GroupController
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class GroupController extends Controller
{
    public $name = "Groups";

    /**
     *
     */
    public function actionIndex()
    {
        $provider = Group::model()->getProvider(array(
            'criteria' => array(
                'with' => array(
                    'speciality',
                    'curator',
                ),
            ),
            'sort' => array(
                'defaultOrder' => 't.title ASC',
                'attributes' => array(
                    'speciality.title' => 'speciality.title',
                    'curator.name' => array(
                        'asc' => 'curator.last_name, curator.middle_name, curator.first_name',
                        'desc' => 'curator.last_name DESC, curator.middle_name DESC, curator.first_name DESC',
                    ),
                    '*'
                )
            )
        ));
        $this->render('index', array('provider' => $provider,));
    }

    public function actionMakeExcel($id)
    {
        /**@var $excel ExcelMaker */
        $excel = Yii::app()->getComponent('excel');
        $group = Group::model()->loadContent($id);
        $excel->getDocument($group, 'simpleGroupList');
    }

    public function actionDoc($id)
    {
        $model = new GroupDocForm();
        $model->group = Group::model()->loadContent($id);
        if (isset($_POST['GroupDocForm'])) {
            $model->attributes = $_POST['GroupDocForm'];
            $model->getDoc();
        }
        $this->render('doc', array('model' => $model));
    }

    /**
     *
     */
    public function actionCreate()
    {
        $model = new Group();

        $this->ajaxValidation('group-form', $model);

        if (isset($_POST['Group'])) {
            $model->attributes = $_POST['Group'];

            if(!Yii::app()->user->checkAccess('manageGroup',
                array(
                    'id' => $model->speciality->department->head_id,
                    'type' => User::TYPE_TEACHER,
                )
            ))
            {
                throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
            }

            if ($model->save()) {
                $this->redirect(array('group/index'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model = Group::model()->loadContent($id);

        if(
            !Yii::app()->user->checkAccess('manageGroup',
                array(
                    'id' => $model->curator_id,
                    'type' => User::TYPE_TEACHER,
                )
            )
            &&
            !Yii::app()->user->checkAccess('manageGroup',
                array(
                    'id' => $model->monitor_id,
                    'type' => User::TYPE_STUDENT,
                )
            )
        )
        {
            throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
        }

        $this->ajaxValidation('group-form', $model);

        if (isset($_POST['Group'])) {
            $model->attributes = $_POST['Group'];
            if ($model->save()) {
                $this->redirect(array('group/index'));
            }
        }

        $this->render('update', array('model' => $model,));
    }

    /**
     * @param $id
     */
    public function actionView($id)
    {
        $model = Group::model()->loadContent($id);
        $this->render('view', array('model' => $model,));
    }

    /**
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = Group::model()->loadContent($id);
        if(!Yii::app()->user->checkAccess('manageGroup',
            array(
                'id' => $model->speciality->department->head_id,
                'type' => User::TYPE_TEACHER,
            )
        ))
        {
            throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
        }
        $model->delete();
        if (!Yii::app()->getRequest()->isAjaxRequest) {
            $this->redirect(array('index'));
        }
    }
}