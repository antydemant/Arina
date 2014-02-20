<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @var $this SubjectController
 * @var $model Subject
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Study plans') => $this->createUrl('plan/index'),
    Yii::t('base', 'Subjects') => $this->createUrl('index'),
    Yii::t('studyPlan', 'New subject')
);
?>
<?php
$this->renderPartial('_form', array('model' => $model));
?>