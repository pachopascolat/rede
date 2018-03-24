<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Lance */

$this->title = $model->id_lance;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lance'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lance-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Lance').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id_lance],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_lance], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_lance], [
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
        'id_lance',
        'fecha',
        [
            'attribute' => 'campania.id_campania',
            'label' => Yii::t('app', 'Campania'),
        ],
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
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerCajones->totalCount){
    $gridColumnCajones = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_cajones',
                        'cant_cajones',
            [
                'attribute' => 'especie.id_especie',
                'label' => Yii::t('app', 'Especie')
            ],
            'tipo_muestra',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCajones,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-cajones']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Cajones')),
        ],
        'columns' => $gridColumnCajones
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerCaptura->totalCount){
    $gridColumnCaptura = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_captura',
            [
                'attribute' => 'especie.id_especie',
                'label' => Yii::t('app', 'Especie')
            ],
            'cantidad',
            'peso',
            'cant_cajones',
                ];
    echo Gridview::widget([
        'dataProvider' => $providerCaptura,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-captura']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Captura')),
        ],
        'columns' => $gridColumnCaptura
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerInfoDiversidad->totalCount){
    $gridColumnInfoDiversidad = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_info_diversidad',
                        [
                'attribute' => 'especie.id_especie',
                'label' => Yii::t('app', 'Especie')
            ],
            'cant_individuos',
            'peso_total',
            'cajon_id',
            'transecta',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerInfoDiversidad,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-info-diversidad']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Info Diversidad')),
        ],
        'columns' => $gridColumnInfoDiversidad
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Campania<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCampania = [
        'id_campania',
        'nombre',
        'fecha_salida',
        'fecha_llegada',
        'lugar_salida',
        'lugar_llegada',
        'barco_id',
        'patron_id',
        'jefe_campania_id',
        'cant_tripulantes',
        'observaciones',
    ];
    echo DetailView::widget([
        'model' => $model->campania,
        'attributes' => $gridColumnCampania    ]);
    ?>
    
    <div class="row">
<?php
if($providerSubmuestra->totalCount){
    $gridColumnSubmuestra = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_submuestra',
            'numero',
            'codigo_submuestra',
                        [
                'attribute' => 'especie.id_especie',
                'label' => Yii::t('app', 'Especie')
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
                'label' => Yii::t('app', 'Replecion')
            ],
            'observaciones:ntext',
            'detalle_dieta:boolean',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSubmuestra,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-submuestra']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Submuestra')),
        ],
        'columns' => $gridColumnSubmuestra
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerTallaSexoPlantilla->totalCount){
    $gridColumnTallaSexoPlantilla = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'especie.id_especie',
                'label' => Yii::t('app', 'Especie')
            ],
            'talla',
            'Hembras',
            'Machos',
            'Indeterminado',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTallaSexoPlantilla,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-talla-sexo-plantilla']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Talla Sexo Plantilla')),
        ],
        'columns' => $gridColumnTallaSexoPlantilla
    ]);
}
?>

    </div>
</div>
