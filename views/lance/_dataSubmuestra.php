<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->submuestras,
        'key' => 'id_submuestra'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'submuestra'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
