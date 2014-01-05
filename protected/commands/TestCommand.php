<?php 
/**
 * 
 */
/**
* Test command
*/
class TestCommand extends CConsoleCommand
{	
	public function actionIndex($limit=5)
    {
        echo "run"; echo $limit;
    }
    public function actionInit()
    {
        echo "init";
    }
}
 ?>