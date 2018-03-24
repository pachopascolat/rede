<?php

namespace app\models;

use Yii;
use \app\models\base\Persona as BasePersona;

/**
 * This is the model class for table "persona".
 */
class Persona extends BasePersona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre', 'apellido', 'edad', 'rol_id'], 'required'],
            [['edad', 'rol_id'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 30]
        ]);
    }
	
}
