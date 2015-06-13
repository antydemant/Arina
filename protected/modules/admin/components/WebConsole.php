<?php
Yii::import('admin.components.ConsoleCommand');

class WebConsole extends CComponent
{
    /**@var CConsoleCommandRunner */
    protected $_runner;

    public function  init()
    {
        $this->_runner = new CConsoleCommandRunner();
        $this->_runner->addCommands(Yii::getPathOfAlias('admin.commands'));
    }

    public function run($args = array())
    {
        $args = CMap::mergeArray(array(0 => 'yiic.php'), $args);
        ob_start();
        ob_implicit_flush(false);
        $this->_runner->run($args);
        return ob_get_clean();
    }
}