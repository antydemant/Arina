<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class ScheduleController extends Controller
{
    public $name = "Schedule";
    public function actionIndex()
    {
        //TODO implement
        $provider = Schedule::model()->getAll();
        $this->render(
            'index',
            array(
                'provider' => $provider,
            )
        );
    }

    /**
     * Show schedule for selected target(group, teacher, audience) by PK
     *
     * @param $id
     * @param int $target
     * @throws CHttpException
     */
    public function actionView($id, $target = Schedule::TARGET_GROUP)
    {
        $view = 'view';
        switch ($target) {
            case Schedule::TARGET_GROUP:
                $provider = Schedule::model()->getForGroup($id);
                break;
            case Schedule::TARGET_TEACHER:
                $provider = Schedule::model()->getForTeacher($id);
                break;
            case Schedule::TARGET_AUDIENCE:
                break;
            default:
                throw new CHttpException(400);
        }
        $this->render(
            $view,
            array(
                'provider' => $provider,
            )
        );
    }
}