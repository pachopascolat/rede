<?php

namespace app\models;

use Yii;
use \app\models\base\Lance as BaseLance;

/**
 * This is the model class for table "lance".
 */
class Lance extends BaseLance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_lance', 'fecha', 'campania_id', 'nombre', 'latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final', 'hora_inicio', 'hora_fin', 'prof_inicial', 'prof_final', 'tiempo_arrastre', 'velocidad_arrastre', 'rumbo', 'distancia_recorrida', 'cable_filado_popa'], 'required'],
            [['fecha', 'hora_inicio', 'hora_fin', 'tiempo_arrastre'], 'safe'],
            [['estrato_id', 'estado_mar'], 'integer'],
            [['latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final', 'prof_inicial', 'prof_final', 'velocidad_arrastre', 'rumbo', 'distancia_recorrida', 'cable_filado_popa', 'longitud_red', 'longitud_bridas', 'longitud_patentes', 'distancia_pastecas', 'diferencia_pastecas', 'distancia_portones', 'distancia_punta_alas', 'abertura_vertical_red', 'temp_superficie', 'temp_fondo', 'velocidad_viento', 'presion_barometrica', 'abertura_horiz_red', 'tamanio_red', 'cajones_diversidad', 'total_cajones'], 'number'],
            [['geography'], 'string'],
            [['id_lance', 'campania_id', 'nombre', 'direccion_viento', 'tipo_fondo'], 'string', 'max' => 20]
        ]);
    }
	
}
