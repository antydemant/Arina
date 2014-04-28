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
    protected $list;

    public function init()
    {
        $this->list = GlobalHelper::getWeeksByMonths();
    }

    public function run()
    {
        $this->render('graph', array('list' => $this->list, 'yearAmount' => $this->yearAmount));
    }
}