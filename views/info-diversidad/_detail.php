<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\InfoDiversidad */

?>
<div class="info-diversidad-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id_info_diversidad) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_info_diversidad',
        [
            'attribute' => 'lance.id_lance',
            'label' => Yii::t('app', 'Lance'),
        ],
        [
            'attribute' => 'especie.id_especie',
            'label' => Yii::t('app', 'Especie'),
        ],
        'cant_individuos',
        'peso_total',
        'cajon_id',
        'transecta',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>