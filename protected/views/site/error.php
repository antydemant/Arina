<?php
/* @var $this SiteController */
/* @var $error array */

$this->name = Yii::t('base', 'Error');
$this->breadcrumbs = array(
    Yii::t('base', 'Error'),
);
?>

<h2><?php echo Yii::t('base', 'Error') . " $code"; ?></h2>

<div class="error">
    <?php echo CHtml::encode($message); ?>
</div>