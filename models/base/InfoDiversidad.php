<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "info_diversidad".
 *
 * @property integer $id_info_diversidad
 * @property string $lance_id
 * @property integer $especie_id
 * @property double $cant_individuos
 * @property double $peso_total
 * @property integer $cajon_id
 * @property string $transecta
 *
 * @property \app\models\Especie $especie
 * @property \app\models\Lance $lance
 */
class InfoDiversidad extends \yii\db\ActiveRecord
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
            [['lance_id', 'especie_id', 'cant_individuos', 'cajon_id'], 'required'],
            [['especie_id', 'cajon_id'], 'integer'],
            [['cant_individuos', 'peso_total'], 'number'],
            [['transecta'], 'string'],
            [['lance_id'], 'string', 'max' => 20],
            [['cajon_id', 'cant_individuos', 'lance_id', 'especie_id'], 'unique', 'targetAttribute' => ['cajon_id', 'cant_individuos', 'lance_id', 'especie_id'], 'message' => 'The combination of Lance ID, Especie ID, Cant Individuos and Cajon ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_diversidad';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_info_diversidad' => Yii::t('app', 'Id Info Diversidad'),
            'lance_id' => Yii::t('app', 'Lance ID'),
            'especie_id' => Yii::t('app', 'Especie ID'),
            'cant_individuos' => Yii::t('app', 'Cant Individuos'),
            'peso_total' => Yii::t('app', 'Peso Total'),
            'cajon_id' => Yii::t('app', 'Cajon ID'),
            'transecta' => Yii::t('app', 'Transecta'),
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
     * @return \app\models\InfoDiversidadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\InfoDiversidadQuery(get_called_class());
    }
}
