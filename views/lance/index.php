<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\LanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Lance');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="lance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Lance'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        'id_lance',
        'fecha',
        [
                'attribute' => 'campania_id',
                'label' => Yii::t('app', 'Campania'),
                'value' => function($model){                   
                    return $model->campania->id_campania;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Campania::find()->asArray()->all(), 'id_campania', 'id_campania'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Campania', 'id' => 'grid-lance-search-campania_id']
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
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-lance']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{toggleData}',
            '{export}',
            ExportMenu::widget([
                //                'batchSize' => 1000,
                'headerStyleOptions' => [],
                'boxStyleOptions' => [],
                'batchSize' => 100,
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>
