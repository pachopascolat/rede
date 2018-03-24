<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "especie".
 *
 * @property integer $id_especie
 * @property string $codigo
 * @property string $nombre_vulgar
 * @property string $nombre_cientifico
 *
 * @property \app\models\Cajones[] $cajones
 * @property \app\models\Captura[] $capturas
 * @property \app\models\InfoDiversidad[] $infoDiversidads
 * @property \app\models\Submuestra[] $submuestras
 * @property \app\models\TallaSexoPlantilla[] $tallaSexoPlantillas
 */
class Especie extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'cajones',
            'capturas',
            'infoDiversidads',
            'submuestras',
            'tallaSexoPlantillas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre_vulgar', 'nombre_cientifico'], 'required'],
            [['codigo'], 'string', 'max' => 20],
            [['nombre_vulgar'], 'string', 'max' => 30],
            [['nombre_cientifico'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especie';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_especie' => Yii::t('app', 'Id Especie'),
            'codigo' => Yii::t('app', 'Codigo'),
            'nombre_vulgar' => Yii::t('app', 'Nombre Vulgar'),
            'nombre_cientifico' => Yii::t('app', 'Nombre Cientifico'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCajones()
    {
        return $this->hasMany(\app\models\Cajones::className(), ['especie_id' => 'id_especie']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapturas()
    {
        return $this->hasMany(\app\models\Captura::className(), ['especie_id' => 'id_especie']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfoDiversidads()
    {
        return $this->hasMany(\app\models\InfoDiversidad::className(), ['especie_id' => 'id_especie']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmuestras()
    {
        return $this->hasMany(\app\models\Submuestra::className(), ['especie_id' => 'id_especie']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallaSexoPlantillas()
    {
        return $this->hasMany(\app\models\TallaSexoPlantilla::className(), ['especie_id' => 'id_especie']);
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
     * @return \app\models\EspecieQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EspecieQuery(get_called_class());
    }
}
