<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Submuestra */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Submuestra',
]) . ' ' . $model->id_submuestra;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Submuestra'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_submuestra, 'url' => ['view', 'id' => $model->id_submuestra]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="submuestra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
