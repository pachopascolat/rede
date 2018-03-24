<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "replecion".
 *
 * @property integer $id_replecion
 * @property string $tipo
 *
 * @property \app\models\Submuestra[] $submuestras
 */
class Replecion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'submuestras'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_replecion', 'tipo'], 'required'],
            [['id_replecion'], 'integer'],
            [['tipo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'replecion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_replecion' => Yii::t('app', 'Id Replecion'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmuestras()
    {
        return $this->hasMany(\app\models\Submuestra::className(), ['replecion_id' => 'id_replecion']);
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
     * @return \app\models\ReplecionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ReplecionQuery(get_called_class());
    }
}
