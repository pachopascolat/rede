<div class="form-group" id="add-submuestra">
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
    'formName' => 'Submuestra',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_submuestra' => ['type' => TabularForm::INPUT_TEXT],
        'numero' => ['type' => TabularForm::INPUT_TEXT],
        'codigo_submuestra' => ['type' => TabularForm::INPUT_TEXT],
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
        'largo_total' => ['type' => TabularForm::INPUT_TEXT],
        'peso_total' => ['type' => TabularForm::INPUT_TEXT],
        'sexo' => ['type' => TabularForm::INPUT_TEXT],
        'peso_higado' => ['type' => TabularForm::INPUT_TEXT],
        'peso_higado_roto' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'peso_gonada' => ['type' => TabularForm::INPUT_TEXT],
        'peso_gonada_roto' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'estadio_gonadal' => ['type' => TabularForm::INPUT_TEXT],
        'peso_estomago' => ['type' => TabularForm::INPUT_TEXT],
        'peso_estomago_roto' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'replecion_id' => [
            'label' => 'Replecion',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Replecion::find()->orderBy('id_replecion')->asArray()->all(), 'id_replecion', 'id_replecion'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Replecion')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'observaciones' => ['type' => TabularForm::INPUT_TEXTAREA],
        'detalle_dieta' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowSubmuestra(' . $key . '); return false;', 'id' => 'submuestra-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Submuestra'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSubmuestra()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

