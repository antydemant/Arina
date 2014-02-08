<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class TeacherController extends Controller
{
    public $name = "Teachers";

    /**
     *
     */
    public function actionIndex()
    {
        $provider = Teacher::model()->getProvider();
        $columns = $this->getColumns();
        $this->render(
            'index',
            array(
                'provider' => $provider,
                'columns' => $columns,
            )
        );
    }

    public function actionCreate()
    {
        $model = new Teacher();

        if (isset($_POST['Teacher'])) {
            $model->attributes = $_POST['Teacher'];
            if ($model->save()) {
                $this->redirect("teacher/index");
            }
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * Get columns for grid view
     * @return array
     */
    protected function getColumns()
    {
        return array(
            'fullName',
            array(
                'name' => 'cyclic_commission_id',
                'value' =>'$data->cyclicCommission->title',
            ),
            array(
                'header' => Yii::t('base', 'Actions'),
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{delete}{view}',

                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id"=>$data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data->id))',
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id"=>$data->id))',
            )
        );
    }
}