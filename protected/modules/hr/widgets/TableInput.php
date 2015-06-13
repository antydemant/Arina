<?php

/**
 * @author Volodymyr Gamula <v.gamula@gmail.com>
 */
class TableInput extends CInputWidget
{
    public $fields = array();

   public function init()
   {

   }

   public function run()
   {
        $this->render('tableInput');
   }
}