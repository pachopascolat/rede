<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->arrastres,
        'key' => 'id_arrastre'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'arrastre'
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
