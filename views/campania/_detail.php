<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Campania */

?>
<div class="campania-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id_campania) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_campania',
        'nombre',
        'fecha_salida',
        'fecha_llegada',
        'lugar_salida',
        'lugar_llegada',
        [
            'attribute' => 'barco.id_barco',
            'label' => 'Barco',
        ],
        [
            'attribute' => 'patron.id',
            'label' => 'Patron',
        ],
        [
            'attribute' => 'jefeCampania.id',
            'label' => 'Jefe Campania',
        ],
        'cant_tripulantes',
        'observaciones:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>