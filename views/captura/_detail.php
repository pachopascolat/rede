<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Captura */

?>
<div class="captura-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id_captura) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_captura',
        [
            'attribute' => 'especie.id_especie',
            'label' => Yii::t('app', 'Especie'),
        ],
        'cantidad',
        'peso',
        'cant_cajones',
        [
            'attribute' => 'lance.id_lance',
            'label' => Yii::t('app', 'Lance'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>