<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VwDiversidadConLances */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vw Diversidad Con Lances',
]) . ' ' . $model->id_info_diversidad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vw Diversidad Con Lances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_info_diversidad, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vw-diversidad-con-lances-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
