<div class="form-group" id="add-arrastre">
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
    'formName' => 'Arrastre',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_arrastre' => ['type' => TabularForm::INPUT_HIDDEN],
        'tipo_portones' => ['type' => TabularForm::INPUT_TEXT],
        'peso_portones' => ['type' => TabularForm::INPUT_TEXT],
        'largo_portones' => ['type' => TabularForm::INPUT_TEXT],
        'alto_portones' => ['type' => TabularForm::INPUT_TEXT],
        'calcetin' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'tamanio_malla' => ['type' => TabularForm::INPUT_TEXT],
        'largo_relinga_superior' => ['type' => TabularForm::INPUT_TEXT],
        'largo_relinga_inferior' => ['type' => TabularForm::INPUT_TEXT],
        'tamanio_malla_capo' => ['type' => TabularForm::INPUT_TEXT],
        'largo_brida' => ['type' => TabularForm::INPUT_TEXT],
        'largo_potente' => ['type' => TabularForm::INPUT_TEXT],
        'observaciones' => ['type' => TabularForm::INPUT_TEXTAREA],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowArrastre(' . $key . '); return false;', 'id' => 'arrastre-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Arrastre', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowArrastre()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

