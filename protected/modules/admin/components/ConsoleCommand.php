<?php

class ConsoleCommand extends CConsoleCommand
{
    public function confirm($message, $default = false)
    {
        if (isset(Yii::app()->session['console-confirm'])) {
            unset(Yii::app()->session['console-confirm']);
            unset(Yii::app()->session['show-confirm']);
            return true;
        } else {
            Yii::app()->session['show-confirm'] = true;
            return false;
        }
    }
}