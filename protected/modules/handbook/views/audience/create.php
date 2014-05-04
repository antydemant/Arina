<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Audience $model
 */

$this->title = 'Create Audience';
$this->params['breadcrumbs'][] = ['label' => 'Audiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audience-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
