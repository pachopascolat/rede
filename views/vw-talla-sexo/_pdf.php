<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\VwTallaSexo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vw Talla Sexo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vw-talla-sexo-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Vw Talla Sexo').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'lance_id',
        'especie_id',
        'nombre_vulgar',
        'talla',
        'Hembras',
        'Machos',
        'Indeterminado',
        'id_campania',
        'latitud_inicial',
        'longitud_inicial',
        'latitud_final',
        'longitud_final',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
