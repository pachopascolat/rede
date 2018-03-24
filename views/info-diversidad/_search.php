<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InfoDiversidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-info-diversidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_info_diversidad')->textInput(['placeholder' => 'Id Info Diversidad']) ?>

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

    <?= $form->field($model, 'cant_individuos')->textInput(['placeholder' => 'Cant Individuos']) ?>

    <?= $form->field($model, 'peso_total')->textInput(['placeholder' => 'Peso Total']) ?>

    <?php /* echo $form->field($model, 'cajon_id')->textInput(['placeholder' => 'Cajon']) */ ?>

    <?php /* echo $form->field($model, 'transecta')->textInput(['placeholder' => 'Transecta']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
