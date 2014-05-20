<?php
/* @var $this DefaultController */
/* @var $model FileModel */
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<?php $form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
echo $form->labelEx($model, 'file');
echo $form->fileField($model, 'file');
echo $form->error($model, 'file');

echo CHtml::submitButton('Імпортувати!');
$this->endWidget();

?>