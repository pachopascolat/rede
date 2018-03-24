<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InfoDiversidad */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Info Diversidad',
]) . ' ' . $model->id_info_diversidad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Info Diversidad'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_info_diversidad, 'url' => ['view', 'id' => $model->id_info_diversidad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="info-diversidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
