<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->capturas,
        'key' => 'id_captura'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'id_captura',
        [
                'attribute' => 'especie.id_especie',
                'label' => Yii::t('app', 'Especie')
            ],
        'cantidad',
        'peso',
        'cant_cajones',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'captura'
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
