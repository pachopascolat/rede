<?php

namespace app\models;

use Yii;
use \app\models\base\Captura as BaseCaptura;

/**
 * This is the model class for table "captura".
 */
class Captura extends BaseCaptura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['especie_id', 'cantidad'], 'integer'],
            [['peso', 'cant_cajones'], 'number'],
            [['lance_id'], 'string']
        ]);
    }
	
}
