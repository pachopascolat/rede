<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VwTallaSexo */

$this->title = Yii::t('app', 'Create Vw Talla Sexo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vw Talla Sexo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vw-talla-sexo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
