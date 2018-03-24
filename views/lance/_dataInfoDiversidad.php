<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->infoDiversidads,
        'key' => 'id_info_diversidad'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'info-diversidad'
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
