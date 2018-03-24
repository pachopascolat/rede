<?php

namespace app\models;

use Yii;
use \app\models\base\Especie as BaseEspecie;

/**
 * This is the model class for table "especie".
 */
class Especie extends BaseEspecie
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['codigo', 'nombre_vulgar', 'nombre_cientifico'], 'required'],
            [['codigo'], 'string', 'max' => 20],
            [['nombre_vulgar'], 'string', 'max' => 30],
            [['nombre_cientifico'], 'string', 'max' => 50]
        ]);
    }
	
}
