<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class StudentController extends Controller
{
    public $name = 'Students';
    public function actionIndex()
    {
        $provider = Student::model()->getProvider();
        $this->render(
            'index',
            array(
                'provider'=>$provider,
                'columns'=>$this->getColumns(),
            )
        );
    }

    protected function getColumns()
    {
        return array(
            array('name'=>'firstname'),
        );
    }
}