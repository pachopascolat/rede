<?php

namespace app\models;

use Yii;
use \app\models\base\Replecion as BaseReplecion;

/**
 * This is the model class for table "replecion".
 */
class Replecion extends BaseReplecion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_replecion', 'tipo'], 'required'],
            [['id_replecion'], 'integer'],
            [['tipo'], 'string', 'max' => 20]
        ]);
    }
	
}
