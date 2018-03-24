<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "campania".
 *
 * @property string $id_campania
 * @property string $nombre
 * @property string $fecha_salida
 * @property string $fecha_llegada
 * @property string $lugar_salida
 * @property string $lugar_llegada
 * @property integer $barco_id
 * @property integer $patron_id
 * @property integer $jefe_campania_id
 * @property integer $cant_tripulantes
 * @property string $observaciones
 *
 * @property \app\models\Arrastre[] $arrastres
 * @property \app\models\Barco $barco
 * @property \app\models\Persona $patron
 * @property \app\models\Persona $jefeCampania
 * @property \app\models\Lance[] $lances
 */
class Campania extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'arrastres',
            'barco',
            'patron',
            'jefeCampania',
            'lances'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_campania', 'nombre', 'fecha_salida', 'observaciones'], 'required'],
            [['fecha_salida', 'fecha_llegada'], 'safe'],
            [['barco_id', 'patron_id', 'jefe_campania_id', 'cant_tripulantes'], 'integer'],
            [['observaciones'], 'string'],
            [['id_campania', 'nombre', 'lugar_salida', 'lugar_llegada'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campania';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_campania' => Yii::t('app', 'Id Campania'),
            'nombre' => Yii::t('app', 'Nombre'),
            'fecha_salida' => Yii::t('app', 'Fecha Salida'),
            'fecha_llegada' => Yii::t('app', 'Fecha Llegada'),
            'lugar_salida' => Yii::t('app', 'Lugar Salida'),
            'lugar_llegada' => Yii::t('app', 'Lugar Llegada'),
            'barco_id' => Yii::t('app', 'Barco ID'),
            'patron_id' => Yii::t('app', 'Patron ID'),
            'jefe_campania_id' => Yii::t('app', 'Jefe Campania ID'),
            'cant_tripulantes' => Yii::t('app', 'Cant Tripulantes'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrastres()
    {
        return $this->hasMany(\app\models\Arrastre::className(), ['campania_id' => 'id_campania']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarco()
    {
        return $this->hasOne(\app\models\Barco::className(), ['id_barco' => 'barco_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatron()
    {
        return $this->hasOne(\app\models\Persona::className(), ['id' => 'patron_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJefeCampania()
    {
        return $this->hasOne(\app\models\Persona::className(), ['id' => 'jefe_campania_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLances()
    {
        return $this->hasMany(\app\models\Lance::className(), ['campania_id' => 'id_campania']);
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
     * @return \app\models\CampaniaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CampaniaQuery(get_called_class());
    }
}
