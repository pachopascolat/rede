<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Lance')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Cajones')),
        'content' => $this->render('_dataCajones', [
            'model' => $model,
            'row' => $model->cajones,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Captura')),
        'content' => $this->render('_dataCaptura', [
            'model' => $model,
            'row' => $model->capturas,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Info Diversidad')),
        'content' => $this->render('_dataInfoDiversidad', [
            'model' => $model,
            'row' => $model->infoDiversidads,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Submuestra')),
        'content' => $this->render('_dataSubmuestra', [
            'model' => $model,
            'row' => $model->submuestras,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Talla Sexo Plantilla')),
        'content' => $this->render('_dataTallaSexoPlantilla', [
            'model' => $model,
            'row' => $model->tallaSexoPlantillas,
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
