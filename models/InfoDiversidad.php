<?php

namespace app\models;

use Yii;
use \app\models\base\InfoDiversidad as BaseInfoDiversidad;

/**
 * This is the model class for table "info_diversidad".
 */
class InfoDiversidad extends BaseInfoDiversidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['lance_id', 'especie_id', 'cant_individuos', 'cajon_id'], 'required'],
            [['especie_id', 'cajon_id'], 'integer'],
            [['cant_individuos', 'peso_total'], 'number'],
            [['transecta'], 'string'],
            [['lance_id'], 'string', 'max' => 20],
            [['cajon_id', 'cant_individuos', 'lance_id', 'especie_id'], 'unique', 'targetAttribute' => ['cajon_id', 'cant_individuos', 'lance_id', 'especie_id'], 'message' => 'The combination of Lance ID, Especie ID, Cant Individuos and Cajon ID has already been taken.']
        ]);
    }
	
}
