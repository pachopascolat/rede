<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Submuestra */

?>
<div class="submuestra-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id_submuestra) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_submuestra',
        'numero',
        'codigo_submuestra',
        [
            'attribute' => 'lance.id_lance',
            'label' => Yii::t('app', 'Lance'),
        ],
        [
            'attribute' => 'especie.id_especie',
            'label' => Yii::t('app', 'Especie'),
        ],
        'largo_total',
        'peso_total',
        'sexo',
        'peso_higado',
        'peso_higado_roto:boolean',
        'peso_gonada',
        'peso_gonada_roto:boolean',
        'estadio_gonadal',
        'peso_estomago',
        'peso_estomago_roto:boolean',
        [
            'attribute' => 'replecion.id_replecion',
            'label' => Yii::t('app', 'Replecion'),
        ],
        'observaciones:ntext',
        'detalle_dieta:boolean',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>