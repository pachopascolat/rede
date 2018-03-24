<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\VwDiversidadConLancesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;


$this->title = Yii::t('app', 'Vw Diversidad Con Lances');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);


//boton muestra y oculta el filtro de columnas
//$filter = "";
//$this->registerJs($filter);

//pjax para esconder columnas
$js =
    "
    $('.filtercol-button').click(function(){
	    $('#filter-form').toggle(500);
	    return false;
    });
    
    $('#filter-form input:checkbox').change(function() {
         jQuery('.grid-view').yiiGridView({'filterUrl':'/index.php?r=vw-diversidad-con-lances%2Findex','filterSelector':'#filter-form input'});
    });
    $('.check-all').click(function() {

        $('#filter-form input:checkbox').trigger('click');

});
    ";

$this->registerJs($js);

?>
<div class="vw-diversidad-con-lances-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Vw Diversidad Con Lances'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
        <?= Html::a(Yii::t('app', 'Hide Columns'), '#', ['class' => 'btn btn-warning filtercol-button']) ?>

    <div id="filter-form" style='display:none'>
        <?php
        //      Barra de filtro de columnas visibles
        echo Html::button("Hide All",['class'=>'btn btn-default check-all']);
        $attributes = array_keys($searchModel->getAttributes());
        $attributes = array_combine($attributes,$attributes);
        echo \kartik\helpers\Html::checkboxButtonGroup('colfilter',null,$attributes,['class'=>'filters']);

        ?>
    </div>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php



    $gridColumn = [
//        ['class' => 'yii\grid\SerialColumn'],
        'id_info_diversidad',
        'lance_id',
        'especie_id',
        'cant_individuos',
        'peso_total',
        'cajon_id',
//        'transecta',
        'nombre_vulgar',
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
//        'geography',
//        [
//            'class' => 'yii\grid\ActionColumn',
//        ],
    ];

    //elimino la columna oculta
    foreach ($hide as $col) {
        \yii\helpers\ArrayHelper::removeValue($gridColumn, $col);
    }

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'condensed' => true,
        'responsive' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-vw-diversidad-con-lances']],
        'panel' => [
//            'before' => '{toggleData}',
//            'after' => true,
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'toggleDataOptions' => [
                'maxCount' => 5000
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            Html::a(Yii::t('app', 'Export Full CSV'), ['index','export'=>1], ['data-pjax' =>0, 'class' => 'btn btn-danger']),
            '{toggleData}',
            '{export}',
//            ExportMenu::widget([
//                'batchSize' => 200,
////                'headerStyleOptions' => [],
////                'boxStyleOptions' => [],
//                'dataProvider' => $dataProvider,
//                'columns' => $gridColumn,
//                'target' => ExportMenu::TARGET_BLANK,
//                'fontAwesome' => true,
////                'enableFormatter' => false,
////                'clearBuffers' => true,
//                'dropdownOptions' => [
//                    'label' => 'Full',
//                    'class' => 'btn btn-default',
//                    'itemsBefore' => [
//                        '<li class="dropdown-header">Export All Data</li>',
//                    ],
//                ],
//            ]) ,

        ],
    ]); ?>

</div>
