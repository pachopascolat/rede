<?php
/* @var $this yii\web\View */
/* @var $searchModel app\models\VwTallaSexoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
use kartik\widgets\ActiveForm;
use yii\web\View;

$this->title = Yii::t('app', 'Vw Talla Sexo');
//$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);

//boton muestra y oculta el filtro de columnas
$filter = "$('.filtercol-button').click(function(){
	$('#filter-form').toggle(500);
	return false;
});";
$this->registerJs($filter);

//pjax para esconder columnas
$js =
    "$('.filters input:checkbox').change(function() {
         jQuery('#w5').yiiGridView({'filterUrl':'/index.php?r=vw-talla-sexo%2Findex','filterSelector':'#filter-form input'});
    });";
$this->registerJs($js);

?>
<div class="vw-talla-sexo-index">

    <h1 class=""><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Vw Talla Sexo'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
        <?= Html::a(Yii::t('app', 'Hide Columns'), '#', ['class' => 'btn btn-warning filtercol-button']) ?>

        <?php

        //      Barra de filtro de columnas visibles
        $attributes = array_keys($searchModel->getAttributes());
        $attributes = array_combine($attributes,$attributes);
        echo \kartik\helpers\Html::checkboxButtonGroup('colfilter',null,$attributes,['id'=>'filter-form','class'=>'filters','style'=>'display:none']);

        ?>

    </p>
    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'lance_id',
        'especie_id',
        'nombre_vulgar',
        'talla',
        'Hembras',
        'Machos',
        'Indeterminado',
        'id_campania',
        'latitud_inicial',
        'longitud_inicial',
        'latitud_final',
        'longitud_final',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ];

    //elimino la columna oculta
    foreach ($hide as $col) {
        \yii\helpers\ArrayHelper::removeValue($gridColumn, $col);
    }


    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
//        'bordered' => true,
//        'striped' => true,
        'condensed' => true,
        'responsive' => true,
//        'hover' => true,
//        'showPageSummary' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-vw-talla-sexo']],
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
//                'headerStyleOptions' => [],
//                'boxStyleOptions' => [],
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
//                'dropdownOptions' => [
//                    'label' => 'Full',
//                    'class' => 'btn btn-default',
//                    'itemsBefore' => [
//                        '<li class="dropdown-header">Export All Data</li>',
//                    ],
//                ],
            ]),
        ],
    ]);


    ?>

</div>

    
