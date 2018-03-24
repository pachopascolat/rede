<?php

namespace app\models;

use Yii;
use \app\models\base\VwDiversidadConLances as BaseVwDiversidadConLances;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "vw_diversidad_con_lances".
 */
class VwDiversidadConLances extends BaseVwDiversidadConLances
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_info_diversidad', 'especie_id', 'cajon_id', 'estrato_id', 'estado_mar'], 'integer'],
            [['cant_individuos', 'peso_total', 'latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final', 'prof_inicial', 'prof_final', 'velocidad_arrastre', 'rumbo', 'distancia_recorrida', 'cable_filado_popa', 'longitud_red', 'longitud_bridas', 'longitud_patentes', 'distancia_pastecas', 'diferencia_pastecas', 'distancia_portones', 'distancia_punta_alas', 'abertura_vertical_red', 'temp_superficie', 'temp_fondo', 'velocidad_viento', 'presion_barometrica', 'abertura_horiz_red', 'tamanio_red', 'cajones_diversidad', 'total_cajones'], 'number'],
            [['transecta', 'geography'], 'string'],
            [['fecha', 'hora_inicio', 'hora_fin', 'tiempo_arrastre'], 'safe'],
            [['lance_id', 'id_lance', 'campania_id', 'nombre', 'direccion_viento', 'tipo_fondo'], 'string', 'max' => 20],
            [['nombre_vulgar'], 'string', 'max' => 30]
        ]);
    }

    public function outputCSV($dataProvider,$fileName = 'data.csv',$delimiter=';') {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=".$fileName);
        header("Pragma: no-cache");
        header("Expires: 0");

        $header = array_keys($this->getAttributes());

        $dataProvider->pagination = false;
        $models = ArrayHelper::toArray($dataProvider->getModels());

        $f = fopen("php://output", "w");


        fputcsv($f,$header,$delimiter);
        foreach ($models as $line) {
            fputcsv($f, $line, $delimiter);
        }
        fclose($f);

        die();
    }


}
