<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lance */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Lance',
]) . ' ' . $model->id_lance;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lance'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lance, 'url' => ['view', 'id' => $model->id_lance]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
