<?php

namespace app\models;

use Yii;
use \app\models\base\Submuestra as BaseSubmuestra;

/**
 * This is the model class for table "submuestra".
 */
class Submuestra extends BaseSubmuestra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_submuestra', 'numero', 'codigo_submuestra', 'lance_id', 'especie_id', 'peso_gonada', 'replecion_id'], 'required'],
            [['numero', 'especie_id', 'replecion_id'], 'integer'],
            [['largo_total', 'peso_total', 'peso_higado', 'peso_gonada', 'peso_estomago'], 'number'],
            [['peso_higado_roto', 'peso_gonada_roto', 'peso_estomago_roto', 'detalle_dieta'], 'boolean'],
            [['observaciones'], 'string'],
            [['id_submuestra', 'codigo_submuestra', 'lance_id'], 'string', 'max' => 20],
            [['sexo'], 'string', 'max' => 3],
            [['estadio_gonadal'], 'string', 'max' => 10]
        ]);
    }
	
}
