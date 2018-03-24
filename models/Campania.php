<?php

namespace app\models;

use Yii;
use \app\models\base\Campania as BaseCampania;

/**
 * This is the model class for table "campania".
 */
class Campania extends BaseCampania
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_campania', 'nombre', 'fecha_salida', 'observaciones'], 'required'],
            [['fecha_salida', 'fecha_llegada'], 'safe'],
            [['barco_id', 'patron_id', 'jefe_campania_id', 'cant_tripulantes'], 'integer'],
            [['observaciones'], 'string'],
            [['id_campania', 'nombre', 'lugar_salida', 'lugar_llegada'], 'string', 'max' => 20]
        ]);
    }
	
}
