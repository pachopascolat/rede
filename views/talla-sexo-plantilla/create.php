<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TallaSexoPlantilla */

$this->title = Yii::t('app', 'Create Talla Sexo Plantilla');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talla Sexo Plantilla'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talla-sexo-plantilla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
