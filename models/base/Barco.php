<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "barco".
 *
 * @property integer $id_barco
 * @property string $nombre
 * @property integer $eslora
 * @property double $potencia_maquina
 * @property double $trb
 * @property double $manga
 * @property double $puntal
 *
 * @property \app\models\Campania[] $campanias
 */
class Barco extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'campanias'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'eslora', 'potencia_maquina', 'trb', 'manga', 'puntal'], 'required'],
            [['eslora'], 'integer'],
            [['potencia_maquina', 'trb', 'manga', 'puntal'], 'number'],
            [['nombre'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barco';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_barco' => Yii::t('app', 'Id Barco'),
            'nombre' => Yii::t('app', 'Nombre'),
            'eslora' => Yii::t('app', 'Eslora'),
            'potencia_maquina' => Yii::t('app', 'Potencia Maquina'),
            'trb' => Yii::t('app', 'Trb'),
            'manga' => Yii::t('app', 'Manga'),
            'puntal' => Yii::t('app', 'Puntal'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampanias()
    {
        return $this->hasMany(\app\models\Campania::className(), ['barco_id' => 'id_barco']);
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
     * @return \app\models\BarcoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\BarcoQuery(get_called_class());
    }
}
