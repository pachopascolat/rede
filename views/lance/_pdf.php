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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_lance',
        'fecha',
        [
                'attribute' => 'campania.id_campania',
                'label' => Yii::t('app', 'Campania')
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Cajones')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Captura')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Info Diversidad')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnInfoDiversidad
    ]);
}
?>
    </div>
    
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Submuestra')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Talla Sexo Plantilla')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnTallaSexoPlantilla
    ]);
}
?>
    </div>
</div>
