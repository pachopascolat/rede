<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TallaSexoPlantilla */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="talla-sexo-plantilla-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'lance_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Lance::find()->orderBy('id_lance')->asArray()->all(), 'id_lance', 'id_lance'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lance')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'especie_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Especie::find()->orderBy('id_especie')->asArray()->all(), 'id_especie', 'id_especie'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Especie')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'talla')->textInput(['placeholder' => 'Talla']) ?>

    <?= $form->field($model, 'Hembras')->textInput(['placeholder' => 'Hembras']) ?>

    <?= $form->field($model, 'Machos')->textInput(['placeholder' => 'Machos']) ?>

    <?= $form->field($model, 'Indeterminado')->textInput(['placeholder' => 'Indeterminado']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
