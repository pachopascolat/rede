<div class="form-group" id="add-lance">
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
    'formName' => 'Lance',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_lance' => ['type' => TabularForm::INPUT_TEXT],
        'fecha' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Fecha',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'nombre' => ['type' => TabularForm::INPUT_TEXT],
        'estrato_id' => ['type' => TabularForm::INPUT_TEXT],
        'latitud_inicial' => ['type' => TabularForm::INPUT_TEXT],
        'longitud_inicial' => ['type' => TabularForm::INPUT_TEXT],
        'latitud_final' => ['type' => TabularForm::INPUT_TEXT],
        'longitud_final' => ['type' => TabularForm::INPUT_TEXT],
        'hora_inicio' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Hora Inicio',
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'hora_fin' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Hora Fin',
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'prof_inicial' => ['type' => TabularForm::INPUT_TEXT],
        'prof_final' => ['type' => TabularForm::INPUT_TEXT],
        'tiempo_arrastre' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tiempo Arrastre',
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'velocidad_arrastre' => ['type' => TabularForm::INPUT_TEXT],
        'rumbo' => ['type' => TabularForm::INPUT_TEXT],
        'distancia_recorrida' => ['type' => TabularForm::INPUT_TEXT],
        'cable_filado_popa' => ['type' => TabularForm::INPUT_TEXT],
        'longitud_red' => ['type' => TabularForm::INPUT_TEXT],
        'longitud_bridas' => ['type' => TabularForm::INPUT_TEXT],
        'longitud_patentes' => ['type' => TabularForm::INPUT_TEXT],
        'distancia_pastecas' => ['type' => TabularForm::INPUT_TEXT],
        'diferencia_pastecas' => ['type' => TabularForm::INPUT_TEXT],
        'distancia_portones' => ['type' => TabularForm::INPUT_TEXT],
        'distancia_punta_alas' => ['type' => TabularForm::INPUT_TEXT],
        'abertura_vertical_red' => ['type' => TabularForm::INPUT_TEXT],
        'temp_superficie' => ['type' => TabularForm::INPUT_TEXT],
        'temp_fondo' => ['type' => TabularForm::INPUT_TEXT],
        'direccion_viento' => ['type' => TabularForm::INPUT_TEXT],
        'velocidad_viento' => ['type' => TabularForm::INPUT_TEXT],
        'estado_mar' => ['type' => TabularForm::INPUT_TEXT],
        'presion_barometrica' => ['type' => TabularForm::INPUT_TEXT],
        'tipo_fondo' => ['type' => TabularForm::INPUT_TEXT],
        'abertura_horiz_red' => ['type' => TabularForm::INPUT_TEXT],
        'tamanio_red' => ['type' => TabularForm::INPUT_TEXT],
        'cajones_diversidad' => ['type' => TabularForm::INPUT_TEXT],
        'total_cajones' => ['type' => TabularForm::INPUT_TEXT],
        'geography' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowLance(' . $key . '); return false;', 'id' => 'lance-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Lance', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowLance()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

