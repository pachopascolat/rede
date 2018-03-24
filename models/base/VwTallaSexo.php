<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "vw_talla_sexo".
 *
 * @property integer $id
 * @property string $lance_id
 * @property integer $especie_id
 * @property string $nombre_vulgar
 * @property integer $talla
 * @property integer $Hembras
 * @property integer $Machos
 * @property integer $Indeterminado
 * @property string $id_campania
 * @property string $latitud_inicial
 * @property string $longitud_inicial
 * @property string $latitud_final
 * @property string $longitud_final
 */
class VwTallaSexo extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'especie_id', 'talla', 'Hembras', 'Machos', 'Indeterminado'], 'integer'],
            [['latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final'], 'number'],
            [['lance_id', 'id_campania'], 'string', 'max' => 20],
            [['nombre_vulgar'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_talla_sexo';
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
            'nombre_vulgar' => Yii::t('app', 'Nombre Vulgar'),
            'talla' => Yii::t('app', 'Talla'),
            'Hembras' => Yii::t('app', 'Hembras'),
            'Machos' => Yii::t('app', 'Machos'),
            'Indeterminado' => Yii::t('app', 'Indeterminado'),
            'id_campania' => Yii::t('app', 'Id Campania'),
            'latitud_inicial' => Yii::t('app', 'Latitud Inicial'),
            'longitud_inicial' => Yii::t('app', 'Longitud Inicial'),
            'latitud_final' => Yii::t('app', 'Latitud Final'),
            'longitud_final' => Yii::t('app', 'Longitud Final'),
        ];
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
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\VwTallaSexoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\VwTallaSexoQuery(get_called_class());
    }
}
