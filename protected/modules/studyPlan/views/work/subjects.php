<?php
/**
 * @var WorkController $this
 * @var WorkSubject $model
 * @var TbActiveForm $form
 */
$this->breadcrumbs = array(
    'Робочі плани' => $this->createUrl('index'),
    $model->plan->speciality->title => $this->createUrl('view', array('id' => $model->plan->id)),
);
?>
<h3>Додання предметів</h3>
<?php $this->widget(
    'bootstrap.widgets.TbTabs',
    array(
        'type' => 'tabs',
        'tabs' => array(
            array(
                'label' => '1-й семестр',
                'active' => true,
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 1), true),
            ),
            array(
                'label' => '2-й семестр',
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 2), true),
            ),
            array(
                'label' => '3-й семестр',
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 3), true),
            ),
            array(
                'label' => '4-й семестр',
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 4), true),
            ),
            array(
                'label' => '5-й семестр',
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 5), true),
            ),
            array(
                'label' => '6-й семестр',
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 6), true),
            ),
            array(
                'label' => '7-й семестр',
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 7), true),
            ),
            array(
                'label' => '8-й семестр',
                'content' => $this->renderPartial('_semester', array('model' => $model, 'semester' => 8), true),
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