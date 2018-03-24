<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Captura */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="captura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_captura')->textInput(['placeholder' => 'Id Captura']) ?>

    <?= $form->field($model, 'especie_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Especie::find()->orderBy('id_especie')->asArray()->all(), 'id_especie', 'id_especie'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Especie')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'cantidad')->textInput(['placeholder' => 'Cantidad']) ?>

    <?= $form->field($model, 'peso')->textInput(['placeholder' => 'Peso']) ?>

    <?= $form->field($model, 'cant_cajones')->textInput(['placeholder' => 'Cant Cajones']) ?>

    <?= $form->field($model, 'lance_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Lance::find()->orderBy('id_lance')->asArray()->all(), 'id_lance', 'id_lance'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lance')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
