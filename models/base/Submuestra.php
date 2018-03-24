<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "submuestra".
 *
 * @property string $id_submuestra
 * @property integer $numero
 * @property string $codigo_submuestra
 * @property string $lance_id
 * @property integer $especie_id
 * @property string $largo_total
 * @property string $peso_total
 * @property string $sexo
 * @property string $peso_higado
 * @property boolean $peso_higado_roto
 * @property string $peso_gonada
 * @property boolean $peso_gonada_roto
 * @property string $estadio_gonadal
 * @property string $peso_estomago
 * @property boolean $peso_estomago_roto
 * @property integer $replecion_id
 * @property string $observaciones
 * @property boolean $detalle_dieta
 *
 * @property \app\models\Especie $especie
 * @property \app\models\Lance $lance
 * @property \app\models\Replecion $replecion
 */
class Submuestra extends \yii\db\ActiveRecord
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
            'lance',
            'replecion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_submuestra', 'numero', 'codigo_submuestra', 'lance_id', 'especie_id', 'peso_gonada', 'replecion_id'], 'required'],
            [['numero', 'especie_id', 'replecion_id'], 'integer'],
            [['largo_total', 'peso_total', 'peso_higado', 'peso_gonada', 'peso_estomago'], 'number'],
            [['peso_higado_roto', 'peso_gonada_roto', 'peso_estomago_roto', 'detalle_dieta'], 'boolean'],
            [['observaciones'], 'string'],
            [['id_submuestra', 'codigo_submuestra', 'lance_id'], 'string', 'max' => 20],
            [['sexo'], 'string', 'max' => 3],
            [['estadio_gonadal'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'submuestra';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_submuestra' => Yii::t('app', 'Id Submuestra'),
            'numero' => Yii::t('app', 'Numero'),
            'codigo_submuestra' => Yii::t('app', 'Codigo Submuestra'),
            'lance_id' => Yii::t('app', 'Lance ID'),
            'especie_id' => Yii::t('app', 'Especie ID'),
            'largo_total' => Yii::t('app', 'Largo Total'),
            'peso_total' => Yii::t('app', 'Peso Total'),
            'sexo' => Yii::t('app', 'Sexo'),
            'peso_higado' => Yii::t('app', 'Peso Higado'),
            'peso_higado_roto' => Yii::t('app', 'Peso Higado Roto'),
            'peso_gonada' => Yii::t('app', 'Peso Gonada'),
            'peso_gonada_roto' => Yii::t('app', 'Peso Gonada Roto'),
            'estadio_gonadal' => Yii::t('app', 'Estadio Gonadal'),
            'peso_estomago' => Yii::t('app', 'Peso Estomago'),
            'peso_estomago_roto' => Yii::t('app', 'Peso Estomago Roto'),
            'replecion_id' => Yii::t('app', 'Replecion ID'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'detalle_dieta' => Yii::t('app', 'Detalle Dieta'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getReplecion()
    {
        return $this->hasOne(\app\models\Replecion::className(), ['id_replecion' => 'replecion_id']);
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
     * @return \app\models\SubmuestraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SubmuestraQuery(get_called_class());
    }
}
