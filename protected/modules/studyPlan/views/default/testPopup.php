<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 17.02.14
 * Time: 18:14
 */
$cs = Yii::app()->clientScript;
$cs->coreScriptPosition = CClientScript::POS_HEAD;
$cs->scriptMap = array();
$baseUrl = Yii::app()->baseUrl;
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerScriptFile($baseUrl . '/js/fancybox/jquery.fancybox-1.3.1.pack.js');
$cs->registerCssFile($baseUrl . '/js/fancybox/jquery.fancybox-1.3.1.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/popup.js');
echo "<div id='popup'>";
echo CHtml::beginForm();
echo CHtml::link('an ajax test', array('default/addSubject/50'), array('class' => 'class-link'));
echo CHtml::endForm();
echo "</div>";