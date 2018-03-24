<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "cajones".
 *
 * @property integer $id_cajones
 * @property string $lance_id
 * @property integer $cant_cajones
 * @property integer $especie_id
 * @property string $tipo_muestra
 *
 * @property \app\models\Especie $especie
 * @property \app\models\Lance $lance
 */
class Cajones extends \yii\db\ActiveRecord
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
            [['lance_id', 'cant_cajones', 'especie_id', 'tipo_muestra'], 'required'],
            [['cant_cajones', 'especie_id'], 'integer'],
            [['lance_id', 'tipo_muestra'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cajones';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cajones' => Yii::t('app', 'Id Cajones'),
            'lance_id' => Yii::t('app', 'Lance ID'),
            'cant_cajones' => Yii::t('app', 'Cant Cajones'),
            'especie_id' => Yii::t('app', 'Especie ID'),
            'tipo_muestra' => Yii::t('app', 'Tipo Muestra'),
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
     * @return \app\models\CajonesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CajonesQuery(get_called_class());
    }
}
