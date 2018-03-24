<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lance */

$this->title = Yii::t('app', 'Create Lance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lance'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
