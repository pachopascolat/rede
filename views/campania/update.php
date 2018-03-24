<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Campania */

$this->title = 'Update Campania: ' . ' ' . $model->id_campania;
$this->params['breadcrumbs'][] = ['label' => 'Campania', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_campania, 'url' => ['view', 'id' => $model->id_campania]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="campania-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
