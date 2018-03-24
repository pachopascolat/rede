<?php

namespace app\models;

use Yii;
use \app\models\base\TallaSexoPlantilla as BaseTallaSexoPlantilla;

/**
 * This is the model class for table "talla_sexo_plantilla".
 */
class TallaSexoPlantilla extends BaseTallaSexoPlantilla
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['lance_id', 'especie_id', 'talla', 'Hembras', 'Machos', 'Indeterminado'], 'required'],
            [['especie_id', 'talla', 'Hembras', 'Machos', 'Indeterminado'], 'integer'],
            [['lance_id'], 'string', 'max' => 20],
            [['lance_id', 'talla', 'Hembras'], 'unique', 'targetAttribute' => ['lance_id', 'talla', 'Hembras'], 'message' => 'The combination of Lance ID, Talla and Hembras has already been taken.']
        ]);
    }
	
}
