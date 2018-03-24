<?php

namespace app\models;

use Yii;
use \app\models\base\Barco as BaseBarco;

/**
 * This is the model class for table "barco".
 */
class Barco extends BaseBarco
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre', 'eslora', 'potencia_maquina', 'trb', 'manga', 'puntal'], 'required'],
            [['eslora'], 'integer'],
            [['potencia_maquina', 'trb', 'manga', 'puntal'], 'number'],
            [['nombre'], 'string', 'max' => 30]
        ]);
    }
	
}
