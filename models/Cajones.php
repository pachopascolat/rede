<?php

namespace app\models;

use Yii;
use \app\models\base\Cajones as BaseCajones;

/**
 * This is the model class for table "cajones".
 */
class Cajones extends BaseCajones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['lance_id', 'cant_cajones', 'especie_id', 'tipo_muestra'], 'required'],
            [['cant_cajones', 'especie_id'], 'integer'],
            [['lance_id', 'tipo_muestra'], 'string', 'max' => 20]
        ]);
    }
	
}
