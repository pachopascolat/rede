<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VwTallaSexoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-vw-talla-sexo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'lance_id')->textInput(['maxlength' => true, 'placeholder' => 'Lance']) ?>

    <?= $form->field($model, 'especie_id')->textInput(['placeholder' => 'Especie']) ?>

    <?= $form->field($model, 'nombre_vulgar')->textInput(['maxlength' => true, 'placeholder' => 'Nombre Vulgar']) ?>

    <?= $form->field($model, 'talla')->textInput(['placeholder' => 'Talla']) ?>

    <?php /* echo $form->field($model, 'Hembras')->textInput(['placeholder' => 'Hembras']) */ ?>

    <?php /* echo $form->field($model, 'Machos')->textInput(['placeholder' => 'Machos']) */ ?>

    <?php /* echo $form->field($model, 'Indeterminado')->textInput(['placeholder' => 'Indeterminado']) */ ?>

    <?php /* echo $form->field($model, 'id_campania')->textInput(['maxlength' => true, 'placeholder' => 'Id Campania']) */ ?>

    <?php /* echo $form->field($model, 'latitud_inicial')->textInput(['placeholder' => 'Latitud Inicial']) */ ?>

    <?php /* echo $form->field($model, 'longitud_inicial')->textInput(['placeholder' => 'Longitud Inicial']) */ ?>

    <?php /* echo $form->field($model, 'latitud_final')->textInput(['placeholder' => 'Latitud Final']) */ ?>

    <?php /* echo $form->field($model, 'longitud_final')->textInput(['placeholder' => 'Longitud Final']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
