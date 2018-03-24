<?php

namespace app\models;

use Yii;
use \app\models\base\VwTallaSexo as BaseVwTallaSexo;

/**
 * This is the model class for table "vw_talla_sexo".
 */
class VwTallaSexo extends BaseVwTallaSexo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id', 'especie_id', 'talla', 'Hembras', 'Machos', 'Indeterminado'], 'integer'],
            [['latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final'], 'number'],
            [['lance_id', 'id_campania'], 'string', 'max' => 20],
            [['nombre_vulgar'], 'string', 'max' => 30]
        ]);
    }
	
}
