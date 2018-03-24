<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-lance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

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

    <?php /* echo $form->field($model, 'latitud_inicial')->textInput(['placeholder' => 'Latitud Inicial']) */ ?>

    <?php /* echo $form->field($model, 'longitud_inicial')->textInput(['placeholder' => 'Longitud Inicial']) */ ?>

    <?php /* echo $form->field($model, 'latitud_final')->textInput(['placeholder' => 'Latitud Final']) */ ?>

    <?php /* echo $form->field($model, 'longitud_final')->textInput(['placeholder' => 'Longitud Final']) */ ?>

    <?php /* echo $form->field($model, 'hora_inicio')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Hora Inicio'),
                'autoclose' => true
            ]
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'hora_fin')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Hora Fin'),
                'autoclose' => true
            ]
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'prof_inicial')->textInput(['placeholder' => 'Prof Inicial']) */ ?>

    <?php /* echo $form->field($model, 'prof_final')->textInput(['placeholder' => 'Prof Final']) */ ?>

    <?php /* echo $form->field($model, 'tiempo_arrastre')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Tiempo Arrastre'),
                'autoclose' => true
            ]
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'velocidad_arrastre')->textInput(['placeholder' => 'Velocidad Arrastre']) */ ?>

    <?php /* echo $form->field($model, 'rumbo')->textInput(['placeholder' => 'Rumbo']) */ ?>

    <?php /* echo $form->field($model, 'distancia_recorrida')->textInput(['placeholder' => 'Distancia Recorrida']) */ ?>

    <?php /* echo $form->field($model, 'cable_filado_popa')->textInput(['placeholder' => 'Cable Filado Popa']) */ ?>

    <?php /* echo $form->field($model, 'longitud_red')->textInput(['placeholder' => 'Longitud Red']) */ ?>

    <?php /* echo $form->field($model, 'longitud_bridas')->textInput(['placeholder' => 'Longitud Bridas']) */ ?>

    <?php /* echo $form->field($model, 'longitud_patentes')->textInput(['placeholder' => 'Longitud Patentes']) */ ?>

    <?php /* echo $form->field($model, 'distancia_pastecas')->textInput(['placeholder' => 'Distancia Pastecas']) */ ?>

    <?php /* echo $form->field($model, 'diferencia_pastecas')->textInput(['placeholder' => 'Diferencia Pastecas']) */ ?>

    <?php /* echo $form->field($model, 'distancia_portones')->textInput(['placeholder' => 'Distancia Portones']) */ ?>

    <?php /* echo $form->field($model, 'distancia_punta_alas')->textInput(['placeholder' => 'Distancia Punta Alas']) */ ?>

    <?php /* echo $form->field($model, 'abertura_vertical_red')->textInput(['placeholder' => 'Abertura Vertical Red']) */ ?>

    <?php /* echo $form->field($model, 'temp_superficie')->textInput(['placeholder' => 'Temp Superficie']) */ ?>

    <?php /* echo $form->field($model, 'temp_fondo')->textInput(['placeholder' => 'Temp Fondo']) */ ?>

    <?php /* echo $form->field($model, 'direccion_viento')->textInput(['maxlength' => true, 'placeholder' => 'Direccion Viento']) */ ?>

    <?php /* echo $form->field($model, 'velocidad_viento')->textInput(['placeholder' => 'Velocidad Viento']) */ ?>

    <?php /* echo $form->field($model, 'estado_mar')->textInput(['placeholder' => 'Estado Mar']) */ ?>

    <?php /* echo $form->field($model, 'presion_barometrica')->textInput(['placeholder' => 'Presion Barometrica']) */ ?>

    <?php /* echo $form->field($model, 'tipo_fondo')->textInput(['maxlength' => true, 'placeholder' => 'Tipo Fondo']) */ ?>

    <?php /* echo $form->field($model, 'abertura_horiz_red')->textInput(['placeholder' => 'Abertura Horiz Red']) */ ?>

    <?php /* echo $form->field($model, 'tamanio_red')->textInput(['placeholder' => 'Tamanio Red']) */ ?>

    <?php /* echo $form->field($model, 'cajones_diversidad')->textInput(['placeholder' => 'Cajones Diversidad']) */ ?>

    <?php /* echo $form->field($model, 'total_cajones')->textInput(['placeholder' => 'Total Cajones']) */ ?>

    <?php /* echo $form->field($model, 'geography')->textInput(['placeholder' => 'Geography']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
