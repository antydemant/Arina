<?php
/* @var $model JournalViewer */ ?>
<div id="journal-form">
<?php
$form = $this->beginWidget(Booster::FORM);
echo $form->dropDownListRow($model, 'groupId', Group::getListAll('id', 'title'), array('empty' => 'Select group'));
echo $form->dropDownListRow($model, 'subjectId', Subject::getListAll('id', 'title'), array('empty' => 'Select subject'));
echo CHtml::ajaxSubmitButton(Yii::t('base', 'Show'), array('index'), array('replace' => '#journal-form'));
$this->endWidget();
?>
<?php if (!$model->isEmpty):?>

<div>
<pre>
<?php 
//print_r($model->getData()) 
?>
</pre>
</div>

<?php endif;?>
</div>