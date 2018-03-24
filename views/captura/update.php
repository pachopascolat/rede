<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Captura */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Captura',
]) . ' ' . $model->id_captura;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Captura'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_captura, 'url' => ['view', 'id' => $model->id_captura]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="captura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
