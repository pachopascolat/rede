<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Submuestra */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="submuestra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_submuestra')->textInput(['maxlength' => true, 'placeholder' => 'Id Submuestra']) ?>

    <?= $form->field($model, 'numero')->textInput(['placeholder' => 'Numero']) ?>

    <?= $form->field($model, 'codigo_submuestra')->textInput(['maxlength' => true, 'placeholder' => 'Codigo Submuestra']) ?>

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

    <?= $form->field($model, 'largo_total')->textInput(['placeholder' => 'Largo Total']) ?>

    <?= $form->field($model, 'peso_total')->textInput(['placeholder' => 'Peso Total']) ?>

    <?= $form->field($model, 'sexo')->textInput(['maxlength' => true, 'placeholder' => 'Sexo']) ?>

    <?= $form->field($model, 'peso_higado')->textInput(['placeholder' => 'Peso Higado']) ?>

    <?= $form->field($model, 'peso_higado_roto')->checkbox() ?>

    <?= $form->field($model, 'peso_gonada')->textInput(['placeholder' => 'Peso Gonada']) ?>

    <?= $form->field($model, 'peso_gonada_roto')->checkbox() ?>

    <?= $form->field($model, 'estadio_gonadal')->textInput(['maxlength' => true, 'placeholder' => 'Estadio Gonadal']) ?>

    <?= $form->field($model, 'peso_estomago')->textInput(['placeholder' => 'Peso Estomago']) ?>

    <?= $form->field($model, 'peso_estomago_roto')->checkbox() ?>

    <?= $form->field($model, 'replecion_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Replecion::find()->orderBy('id_replecion')->asArray()->all(), 'id_replecion', 'id_replecion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Replecion')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detalle_dieta')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
