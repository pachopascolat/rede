<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Submuestra */

$this->title = Yii::t('app', 'Create Submuestra');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Submuestra'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submuestra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
