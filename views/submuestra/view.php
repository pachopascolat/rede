<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Submuestra */

$this->title = $model->id_submuestra;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Submuestra'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submuestra-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Submuestra').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id_submuestra],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_submuestra], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_submuestra], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
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
    <div class="row">
        <h4>Especie<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnEspecie = [
        'id_especie',
        'codigo',
        'nombre_vulgar',
        'nombre_cientifico',
    ];
    echo DetailView::widget([
        'model' => $model->especie,
        'attributes' => $gridColumnEspecie    ]);
    ?>
    <div class="row">
        <h4>Lance<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnLance = [
        'id_lance',
        'fecha',
        'campania_id',
        'nombre',
        'estrato_id',
        'latitud_inicial',
        'longitud_inicial',
        'latitud_final',
        'longitud_final',
        'hora_inicio',
        'hora_fin',
        'prof_inicial',
        'prof_final',
        'tiempo_arrastre',
        'velocidad_arrastre',
        'rumbo',
        'distancia_recorrida',
        'cable_filado_popa',
        'longitud_red',
        'longitud_bridas',
        'longitud_patentes',
        'distancia_pastecas',
        'diferencia_pastecas',
        'distancia_portones',
        'distancia_punta_alas',
        'abertura_vertical_red',
        'temp_superficie',
        'temp_fondo',
        'direccion_viento',
        'velocidad_viento',
        'estado_mar',
        'presion_barometrica',
        'tipo_fondo',
        'abertura_horiz_red',
        'tamanio_red',
        'cajones_diversidad',
        'total_cajones',
        'geography',
    ];
    echo DetailView::widget([
        'model' => $model->lance,
        'attributes' => $gridColumnLance    ]);
    ?>
    <div class="row">
        <h4>Replecion<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnReplecion = [
        'id_replecion',
        'tipo',
    ];
    echo DetailView::widget([
        'model' => $model->replecion,
        'attributes' => $gridColumnReplecion    ]);
    ?>
</div>
