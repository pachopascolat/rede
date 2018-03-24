<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VwDiversidadConLances */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="vw-diversidad-con-lances-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_info_diversidad')->textInput(['placeholder' => 'Id Info Diversidad']) ?>

    <?= $form->field($model, 'lance_id')->textInput(['maxlength' => true, 'placeholder' => 'Lance']) ?>

    <?= $form->field($model, 'especie_id')->textInput(['placeholder' => 'Especie']) ?>

    <?= $form->field($model, 'cant_individuos')->textInput(['placeholder' => 'Cant Individuos']) ?>

    <?= $form->field($model, 'peso_total')->textInput(['placeholder' => 'Peso Total']) ?>

    <?= $form->field($model, 'cajon_id')->textInput(['placeholder' => 'Cajon']) ?>

    <?= $form->field($model, 'transecta')->textInput(['placeholder' => 'Transecta']) ?>

    <?= $form->field($model, 'nombre_vulgar')->textInput(['maxlength' => true, 'placeholder' => 'Nombre Vulgar']) ?>

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

    <?= $form->field($model, 'campania_id')->textInput(['maxlength' => true, 'placeholder' => 'Campania']) ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
