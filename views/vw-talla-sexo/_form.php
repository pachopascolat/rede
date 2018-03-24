<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VwTallaSexo */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="vw-talla-sexo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'lance_id')->textInput(['maxlength' => true, 'placeholder' => 'Lance']) ?>

    <?= $form->field($model, 'especie_id')->textInput(['placeholder' => 'Especie']) ?>

    <?= $form->field($model, 'nombre_vulgar')->textInput(['maxlength' => true, 'placeholder' => 'Nombre Vulgar']) ?>

    <?= $form->field($model, 'talla')->textInput(['placeholder' => 'Talla']) ?>

    <?= $form->field($model, 'Hembras')->textInput(['placeholder' => 'Hembras']) ?>

    <?= $form->field($model, 'Machos')->textInput(['placeholder' => 'Machos']) ?>

    <?= $form->field($model, 'Indeterminado')->textInput(['placeholder' => 'Indeterminado']) ?>

    <?= $form->field($model, 'id_campania')->textInput(['maxlength' => true, 'placeholder' => 'Id Campania']) ?>

    <?= $form->field($model, 'latitud_inicial')->textInput(['placeholder' => 'Latitud Inicial']) ?>

    <?= $form->field($model, 'longitud_inicial')->textInput(['placeholder' => 'Longitud Inicial']) ?>

    <?= $form->field($model, 'latitud_final')->textInput(['placeholder' => 'Latitud Final']) ?>

    <?= $form->field($model, 'longitud_final')->textInput(['placeholder' => 'Longitud Final']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
