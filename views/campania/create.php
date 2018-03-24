<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Campania */

$this->title = 'Create Campania';
$this->params['breadcrumbs'][] = ['label' => 'Campania', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
