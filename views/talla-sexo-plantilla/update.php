<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TallaSexoPlantilla */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Talla Sexo Plantilla',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talla Sexo Plantilla'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="talla-sexo-plantilla-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
