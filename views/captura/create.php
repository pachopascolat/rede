<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Captura */

$this->title = Yii::t('app', 'Create Captura');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Captura'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="captura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
