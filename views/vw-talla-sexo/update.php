<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VwTallaSexo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vw Talla Sexo',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vw Talla Sexo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vw-talla-sexo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
