<?php

namespace app\models;

use Yii;
use \app\models\base\Arrastre as BaseArrastre;

/**
 * This is the model class for table "arrastre".
 */
class Arrastre extends BaseArrastre
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['campania_id', 'tipo_portones', 'peso_portones', 'largo_portones', 'alto_portones', 'calcetin', 'tamanio_malla', 'largo_relinga_superior', 'largo_relinga_inferior', 'tamanio_malla_capo', 'largo_brida', 'largo_potente', 'observaciones'], 'required'],
            [['peso_portones', 'largo_portones', 'alto_portones', 'tamanio_malla', 'largo_relinga_superior', 'largo_relinga_inferior', 'tamanio_malla_capo', 'largo_brida', 'largo_potente'], 'number'],
            [['calcetin'], 'boolean'],
            [['observaciones'], 'string'],
            [['campania_id', 'tipo_portones'], 'string', 'max' => 20]
        ]);
    }
	
}
