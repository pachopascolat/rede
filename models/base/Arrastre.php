<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "arrastre".
 *
 * @property integer $id_arrastre
 * @property string $campania_id
 * @property string $tipo_portones
 * @property double $peso_portones
 * @property double $largo_portones
 * @property double $alto_portones
 * @property boolean $calcetin
 * @property double $tamanio_malla
 * @property double $largo_relinga_superior
 * @property double $largo_relinga_inferior
 * @property double $tamanio_malla_capo
 * @property double $largo_brida
 * @property double $largo_potente
 * @property string $observaciones
 *
 * @property \app\models\Campania $campania
 */
class Arrastre extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'campania'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campania_id', 'tipo_portones', 'peso_portones', 'largo_portones', 'alto_portones', 'calcetin', 'tamanio_malla', 'largo_relinga_superior', 'largo_relinga_inferior', 'tamanio_malla_capo', 'largo_brida', 'largo_potente', 'observaciones'], 'required'],
            [['peso_portones', 'largo_portones', 'alto_portones', 'tamanio_malla', 'largo_relinga_superior', 'largo_relinga_inferior', 'tamanio_malla_capo', 'largo_brida', 'largo_potente'], 'number'],
            [['calcetin'], 'boolean'],
            [['observaciones'], 'string'],
            [['campania_id', 'tipo_portones'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arrastre';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_arrastre' => Yii::t('app', 'Id Arrastre'),
            'campania_id' => Yii::t('app', 'Campania ID'),
            'tipo_portones' => Yii::t('app', 'Tipo Portones'),
            'peso_portones' => Yii::t('app', 'Peso Portones'),
            'largo_portones' => Yii::t('app', 'Largo Portones'),
            'alto_portones' => Yii::t('app', 'Alto Portones'),
            'calcetin' => Yii::t('app', 'Calcetin'),
            'tamanio_malla' => Yii::t('app', 'Tamanio Malla'),
            'largo_relinga_superior' => Yii::t('app', 'Largo Relinga Superior'),
            'largo_relinga_inferior' => Yii::t('app', 'Largo Relinga Inferior'),
            'tamanio_malla_capo' => Yii::t('app', 'Tamanio Malla Capo'),
            'largo_brida' => Yii::t('app', 'Largo Brida'),
            'largo_potente' => Yii::t('app', 'Largo Potente'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampania()
    {
        return $this->hasOne(\app\models\Campania::className(), ['id_campania' => 'campania_id']);
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
     * @return \app\models\ArrastreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ArrastreQuery(get_called_class());
    }
}
