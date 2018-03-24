<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InfoDiversidad */

$this->title = Yii::t('app', 'Create Info Diversidad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Info Diversidad'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-diversidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
