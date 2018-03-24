<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Campania */

$this->title = $model->id_campania;
$this->params['breadcrumbs'][] = ['label' => 'Campania', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campania-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Campania'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_campania], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_campania], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
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
    
    <div class="row">
<?php
if($providerArrastre->totalCount){
    $gridColumnArrastre = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_arrastre',
                        'tipo_portones',
            'peso_portones',
            'largo_portones',
            'alto_portones',
            'calcetin:boolean',
            'tamanio_malla',
            'largo_relinga_superior',
            'largo_relinga_inferior',
            'tamanio_malla_capo',
            'largo_brida',
            'largo_potente',
            'observaciones:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerArrastre,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-arrastre']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Arrastre'),
        ],
        'export' => false,
        'columns' => $gridColumnArrastre
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Barco<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBarco = [
        'id_barco',
        'nombre',
        'eslora',
        'potencia_maquina',
        'trb',
        'manga',
        'puntal',
    ];
    echo DetailView::widget([
        'model' => $model->barco,
        'attributes' => $gridColumnBarco    ]);
    ?>
    <div class="row">
        <h4>Persona<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPersona = [
        ['attribute' => 'id', 'visible' => false],
        'nombre',
        'apellido',
        'edad',
        'rol_id',
    ];
    echo DetailView::widget([
        'model' => $model->patron,
        'attributes' => $gridColumnPersona    ]);
    ?>
    <div class="row">
        <h4>Persona<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPersona = [
        ['attribute' => 'id', 'visible' => false],
        'nombre',
        'apellido',
        'edad',
        'rol_id',
    ];
    echo DetailView::widget([
        'model' => $model->jefeCampania,
        'attributes' => $gridColumnPersona    ]);
    ?>
    
    <div class="row">
<?php
if($providerLance->totalCount){
    $gridColumnLance = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_lance',
            'fecha',
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
    echo Gridview::widget([
        'dataProvider' => $providerLance,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-lance']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Lance'),
        ],
        'export' => false,
        'columns' => $gridColumnLance
    ]);
}
?>

    </div>
</div>
