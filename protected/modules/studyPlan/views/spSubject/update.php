<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this SubjectController
 * @var $model SpSubject
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('plan/index'),
    Yii::t('base', 'Subjects') => $this->createUrl('index'),
    $model->subject->title
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>