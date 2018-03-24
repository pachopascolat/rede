<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "talla_sexo_plantilla".
 *
 * @property integer $id
 * @property string $lance_id
 * @property integer $especie_id
 * @property integer $talla
 * @property integer $Hembras
 * @property integer $Machos
 * @property integer $Indeterminado
 *
 * @property \app\models\Especie $especie
 * @property \app\models\Lance $lance
 */
class TallaSexoPlantilla extends \yii\db\ActiveRecord
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
            [['lance_id', 'especie_id', 'talla', 'Hembras', 'Machos', 'Indeterminado'], 'required'],
            [['especie_id', 'talla', 'Hembras', 'Machos', 'Indeterminado'], 'integer'],
            [['lance_id'], 'string', 'max' => 20],
            [['lance_id', 'talla', 'Hembras'], 'unique', 'targetAttribute' => ['lance_id', 'talla', 'Hembras'], 'message' => 'The combination of Lance ID, Talla and Hembras has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'talla_sexo_plantilla';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lance_id' => Yii::t('app', 'Lance ID'),
            'especie_id' => Yii::t('app', 'Especie ID'),
            'talla' => Yii::t('app', 'Talla'),
            'Hembras' => Yii::t('app', 'Hembras'),
            'Machos' => Yii::t('app', 'Machos'),
            'Indeterminado' => Yii::t('app', 'Indeterminado'),
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
     * @return \app\models\TallaSexoPlantillaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TallaSexoPlantillaQuery(get_called_class());
    }
}
