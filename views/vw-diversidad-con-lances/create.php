<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VwDiversidadConLances */

$this->title = Yii::t('app', 'Create Vw Diversidad Con Lances');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vw Diversidad Con Lances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vw-diversidad-con-lances-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
