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

        $sort = new CSort();
        $sort->attributes = array(
            'fullName' => array(
                'asc' => 'last_name, first_name, middle_name ASC',
                'desc' => 'last_name, first_name, middle_name DESC',
            ),
            '*',
        );

        $provider = Teacher::model()->getProvider(
            array(
                'pagination' => array('pageSize' => 20,),
                'sort' => $sort,
            )
        );
        $columns = $this->getColumns();
        $this->render(
            'index',
            array(
                'provider' => $provider,
                'columns' => $columns,
            )
        );
    }

    /**
     * Get columns for grid view
     * @return array
     */
    protected function getColumns()
    {
        return array(
            'id',
            array(
                'name' => 'fullName',
                'value' => '$data->getFullName()',
                'htmlOptions' => array(
                    'width' => '420px',
                )
            ),
            array(
                'name' => 'cyclic_commission_id',
                'value' => '$data->cyclicCommission->title',
                'htmlOptions' => array(
                    'width' => '420px',
                )
            ),
            array(
                'header' => Yii::t('base', 'Actions'),
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{delete}{view}',
            )
        );
    }

    public function actionView($id)
    {
        $model = Teacher::model()->loadContent($id);

        $this->render(
            'view',
            array(
                'model' => $model,
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
}