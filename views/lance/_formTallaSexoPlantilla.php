<div class="form-group" id="add-talla-sexo-plantilla">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'TallaSexoPlantilla',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'especie_id' => [
            'label' => 'Especie',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Especie::find()->orderBy('id_especie')->asArray()->all(), 'id_especie', 'id_especie'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Especie')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'talla' => ['type' => TabularForm::INPUT_TEXT],
        'Hembras' => ['type' => TabularForm::INPUT_TEXT],
        'Machos' => ['type' => TabularForm::INPUT_TEXT],
        'Indeterminado' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowTallaSexoPlantilla(' . $key . '); return false;', 'id' => 'talla-sexo-plantilla-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Talla Sexo Plantilla'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowTallaSexoPlantilla()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

