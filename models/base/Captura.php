<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "captura".
 *
 * @property integer $id_captura
 * @property integer $especie_id
 * @property integer $cantidad
 * @property double $peso
 * @property double $cant_cajones
 * @property string $lance_id
 *
 * @property \app\models\Especie $especie
 * @property \app\models\Lance $lance
 */
class Captura extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'especie',
            'lance'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['especie_id', 'cantidad'], 'integer'],
            [['peso', 'cant_cajones'], 'number'],
            [['lance_id'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'captura';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_captura' => Yii::t('app', 'Id Captura'),
            'especie_id' => Yii::t('app', 'Especie ID'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'peso' => Yii::t('app', 'Peso'),
            'cant_cajones' => Yii::t('app', 'Cant Cajones'),
            'lance_id' => Yii::t('app', 'Lance ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecie()
    {
        return $this->hasOne(\app\models\Especie::className(), ['id_especie' => 'especie_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLance()
    {
        return $this->hasOne(\app\models\Lance::className(), ['id_lance' => 'lance_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => false,
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\CapturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CapturaQuery(get_called_class());
    }
}
