<?php
/**
 * @var WorkController $this
 * @var WorkPlan $model
 * @var TbActiveForm $form
 */
$this->breadcrumbs = array(
    'Робочі плани' => $this->createUrl('index'),
    $model->speciality->title => $this->createUrl('view', array('id' => $model->id)),
);
?>
<h3>Додання предметів</h3>
<?php $this->widget(
    'bootstrap.widgets.TbTabs',
    array(
        'type' => 'tabs',
        'tabs' => array(
            array(
                'label' => '1-й курс',
                'active' => true,
                'content' => $this->renderPartial('_course', array('model' => $model, 'course' => 1), true),
            ),
            array(
                'label' => '2-й курс',
                'content' => $this->renderPartial('_course', array('model' => $model, 'course' => 2), true),
            ),
            array(
                'label' => '3-й курс',
                'content' => $this->renderPartial('_course', array('model' => $model, 'course' => 3), true),
            ),
            array(
                'label' => '4-й курс',
                'content' => $this->renderPartial('_course', array('model' => $model, 'course' => 4), true),
            ),
        )
    )
); ?>

<style>
    .input,
    .options {
        float: left;
    }

    .options input {
        float: left;
    }

    .options {
        margin: 15px 0 0 15px;
    }

    .options:after {
        content: '';
        display: block;
        clear: both;
    }

    .options .item {
        float: left;
        width: 125px;
    }

    .span5 input[type="number"] {
        width: 170px;
    }

    #StudySubject_subject_id {
        width: 100%;
    }
</style>