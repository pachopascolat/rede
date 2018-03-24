<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lance */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Cajones', 
        'relID' => 'cajones', 
        'value' => \yii\helpers\Json::encode($model->cajones),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Captura', 
        'relID' => 'captura', 
        'value' => \yii\helpers\Json::encode($model->capturas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'InfoDiversidad', 
        'relID' => 'info-diversidad', 
        'value' => \yii\helpers\Json::encode($model->infoDiversidads),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Submuestra', 
        'relID' => 'submuestra', 
        'value' => \yii\helpers\Json::encode($model->submuestras),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'TallaSexoPlantilla', 
        'relID' => 'talla-sexo-plantilla', 
        'value' => \yii\helpers\Json::encode($model->tallaSexoPlantillas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="lance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_lance')->textInput(['maxlength' => true, 'placeholder' => 'Id Lance']) ?>

    <?= $form->field($model, 'fecha')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Fecha'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'campania_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Campania::find()->orderBy('id_campania')->asArray()->all(), 'id_campania', 'id_campania'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Campania')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'estrato_id')->textInput(['placeholder' => 'Estrato']) ?>

    <?= $form->field($model, 'latitud_inicial')->textInput(['placeholder' => 'Latitud Inicial']) ?>

    <?= $form->field($model, 'longitud_inicial')->textInput(['placeholder' => 'Longitud Inicial']) ?>

    <?= $form->field($model, 'latitud_final')->textInput(['placeholder' => 'Latitud Final']) ?>

    <?= $form->field($model, 'longitud_final')->textInput(['placeholder' => 'Longitud Final']) ?>

    <?= $form->field($model, 'hora_inicio')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Hora Inicio'),
                'autoclose' => true
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'hora_fin')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Hora Fin'),
                'autoclose' => true
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'prof_inicial')->textInput(['placeholder' => 'Prof Inicial']) ?>

    <?= $form->field($model, 'prof_final')->textInput(['placeholder' => 'Prof Final']) ?>

    <?= $form->field($model, 'tiempo_arrastre')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Tiempo Arrastre'),
                'autoclose' => true
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'velocidad_arrastre')->textInput(['placeholder' => 'Velocidad Arrastre']) ?>

    <?= $form->field($model, 'rumbo')->textInput(['placeholder' => 'Rumbo']) ?>

    <?= $form->field($model, 'distancia_recorrida')->textInput(['placeholder' => 'Distancia Recorrida']) ?>

    <?= $form->field($model, 'cable_filado_popa')->textInput(['placeholder' => 'Cable Filado Popa']) ?>

    <?= $form->field($model, 'longitud_red')->textInput(['placeholder' => 'Longitud Red']) ?>

    <?= $form->field($model, 'longitud_bridas')->textInput(['placeholder' => 'Longitud Bridas']) ?>

    <?= $form->field($model, 'longitud_patentes')->textInput(['placeholder' => 'Longitud Patentes']) ?>

    <?= $form->field($model, 'distancia_pastecas')->textInput(['placeholder' => 'Distancia Pastecas']) ?>

    <?= $form->field($model, 'diferencia_pastecas')->textInput(['placeholder' => 'Diferencia Pastecas']) ?>

    <?= $form->field($model, 'distancia_portones')->textInput(['placeholder' => 'Distancia Portones']) ?>

    <?= $form->field($model, 'distancia_punta_alas')->textInput(['placeholder' => 'Distancia Punta Alas']) ?>

    <?= $form->field($model, 'abertura_vertical_red')->textInput(['placeholder' => 'Abertura Vertical Red']) ?>

    <?= $form->field($model, 'temp_superficie')->textInput(['placeholder' => 'Temp Superficie']) ?>

    <?= $form->field($model, 'temp_fondo')->textInput(['placeholder' => 'Temp Fondo']) ?>

    <?= $form->field($model, 'direccion_viento')->textInput(['maxlength' => true, 'placeholder' => 'Direccion Viento']) ?>

    <?= $form->field($model, 'velocidad_viento')->textInput(['placeholder' => 'Velocidad Viento']) ?>

    <?= $form->field($model, 'estado_mar')->textInput(['placeholder' => 'Estado Mar']) ?>

    <?= $form->field($model, 'presion_barometrica')->textInput(['placeholder' => 'Presion Barometrica']) ?>

    <?= $form->field($model, 'tipo_fondo')->textInput(['maxlength' => true, 'placeholder' => 'Tipo Fondo']) ?>

    <?= $form->field($model, 'abertura_horiz_red')->textInput(['placeholder' => 'Abertura Horiz Red']) ?>

    <?= $form->field($model, 'tamanio_red')->textInput(['placeholder' => 'Tamanio Red']) ?>

    <?= $form->field($model, 'cajones_diversidad')->textInput(['placeholder' => 'Cajones Diversidad']) ?>

    <?= $form->field($model, 'total_cajones')->textInput(['placeholder' => 'Total Cajones']) ?>

    <?= $form->field($model, 'geography')->textInput(['placeholder' => 'Geography']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Cajones')),
            'content' => $this->render('_formCajones', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->cajones),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Captura')),
            'content' => $this->render('_formCaptura', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->capturas),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'InfoDiversidad')),
            'content' => $this->render('_formInfoDiversidad', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->infoDiversidads),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Submuestra')),
            'content' => $this->render('_formSubmuestra', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->submuestras),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'TallaSexoPlantilla')),
            'content' => $this->render('_formTallaSexoPlantilla', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->tallaSexoPlantillas),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
