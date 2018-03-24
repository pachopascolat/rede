<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\TallaSexoPlantilla */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talla Sexo Plantilla'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talla-sexo-plantilla-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Talla Sexo Plantilla').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'lance.id_lance',
                'label' => Yii::t('app', 'Lance')
            ],
        [
                'attribute' => 'especie.id_especie',
                'label' => Yii::t('app', 'Especie')
            ],
        'talla',
        'Hembras',
        'Machos',
        'Indeterminado',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
