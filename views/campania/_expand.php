<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Campania'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Arrastre'),
        'content' => $this->render('_dataArrastre', [
            'model' => $model,
            'row' => $model->arrastres,
        ]),
    ],
                        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Lance'),
        'content' => $this->render('_dataLance', [
            'model' => $model,
            'row' => $model->lances,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
