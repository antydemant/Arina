<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class Graph extends CWidget
{
    public $model;
    public $field;
    public $yearAmount = 4;
    public $graph = null;
    protected $list;
    protected $map;

    public function init()
    {
        if (isset($this->graph)) {
            $this->map = $this->graph;
        } else {
            $this->map = PlanHelper::getDefaultPlan();
        }
        $this->list = GlobalHelper::getWeeksByMonths();
    }

    public function run()
    {
        $this->render('graph', array('map'=>$this->map, 'list' => $this->list, 'yearAmount' => $this->yearAmount));
    }
}