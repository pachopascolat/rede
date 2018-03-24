<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "lance".
 *
 * @property string $id_lance
 * @property string $fecha
 * @property string $campania_id
 * @property string $nombre
 * @property integer $estrato_id
 * @property string $latitud_inicial
 * @property string $longitud_inicial
 * @property string $latitud_final
 * @property string $longitud_final
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property double $prof_inicial
 * @property double $prof_final
 * @property string $tiempo_arrastre
 * @property double $velocidad_arrastre
 * @property double $rumbo
 * @property double $distancia_recorrida
 * @property double $cable_filado_popa
 * @property double $longitud_red
 * @property double $longitud_bridas
 * @property double $longitud_patentes
 * @property double $distancia_pastecas
 * @property double $diferencia_pastecas
 * @property double $distancia_portones
 * @property double $distancia_punta_alas
 * @property double $abertura_vertical_red
 * @property double $temp_superficie
 * @property double $temp_fondo
 * @property string $direccion_viento
 * @property double $velocidad_viento
 * @property integer $estado_mar
 * @property double $presion_barometrica
 * @property string $tipo_fondo
 * @property double $abertura_horiz_red
 * @property double $tamanio_red
 * @property double $cajones_diversidad
 * @property double $total_cajones
 * @property string $geography
 *
 * @property \app\models\Cajones[] $cajones
 * @property \app\models\Captura[] $capturas
 * @property \app\models\InfoDiversidad[] $infoDiversidads
 * @property \app\models\Campania $campania
 * @property \app\models\Submuestra[] $submuestras
 * @property \app\models\TallaSexoPlantilla[] $tallaSexoPlantillas
 */
class Lance extends \yii\db\ActiveRecord
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
            'campania',
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
            [['id_lance', 'fecha', 'campania_id', 'nombre', 'latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final', 'hora_inicio', 'hora_fin', 'prof_inicial', 'prof_final', 'tiempo_arrastre', 'velocidad_arrastre', 'rumbo', 'distancia_recorrida', 'cable_filado_popa'], 'required'],
            [['fecha', 'hora_inicio', 'hora_fin', 'tiempo_arrastre'], 'safe'],
            [['estrato_id', 'estado_mar'], 'integer'],
            [['latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final', 'prof_inicial', 'prof_final', 'velocidad_arrastre', 'rumbo', 'distancia_recorrida', 'cable_filado_popa', 'longitud_red', 'longitud_bridas', 'longitud_patentes', 'distancia_pastecas', 'diferencia_pastecas', 'distancia_portones', 'distancia_punta_alas', 'abertura_vertical_red', 'temp_superficie', 'temp_fondo', 'velocidad_viento', 'presion_barometrica', 'abertura_horiz_red', 'tamanio_red', 'cajones_diversidad', 'total_cajones'], 'number'],
            [['geography'], 'string'],
            [['id_lance', 'campania_id', 'nombre', 'direccion_viento', 'tipo_fondo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lance';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lance' => Yii::t('app', 'Id Lance'),
            'fecha' => Yii::t('app', 'Fecha'),
            'campania_id' => Yii::t('app', 'Campania ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'estrato_id' => Yii::t('app', 'Estrato ID'),
            'latitud_inicial' => Yii::t('app', 'Latitud Inicial'),
            'longitud_inicial' => Yii::t('app', 'Longitud Inicial'),
            'latitud_final' => Yii::t('app', 'Latitud Final'),
            'longitud_final' => Yii::t('app', 'Longitud Final'),
            'hora_inicio' => Yii::t('app', 'Hora Inicio'),
            'hora_fin' => Yii::t('app', 'Hora Fin'),
            'prof_inicial' => Yii::t('app', 'Prof Inicial'),
            'prof_final' => Yii::t('app', 'Prof Final'),
            'tiempo_arrastre' => Yii::t('app', 'Tiempo Arrastre'),
            'velocidad_arrastre' => Yii::t('app', 'Velocidad Arrastre'),
            'rumbo' => Yii::t('app', 'Rumbo'),
            'distancia_recorrida' => Yii::t('app', 'Distancia Recorrida'),
            'cable_filado_popa' => Yii::t('app', 'Cable Filado Popa'),
            'longitud_red' => Yii::t('app', 'Longitud Red'),
            'longitud_bridas' => Yii::t('app', 'Longitud Bridas'),
            'longitud_patentes' => Yii::t('app', 'Longitud Patentes'),
            'distancia_pastecas' => Yii::t('app', 'Distancia Pastecas'),
            'diferencia_pastecas' => Yii::t('app', 'Diferencia Pastecas'),
            'distancia_portones' => Yii::t('app', 'Distancia Portones'),
            'distancia_punta_alas' => Yii::t('app', 'Distancia Punta Alas'),
            'abertura_vertical_red' => Yii::t('app', 'Abertura Vertical Red'),
            'temp_superficie' => Yii::t('app', 'Temp Superficie'),
            'temp_fondo' => Yii::t('app', 'Temp Fondo'),
            'direccion_viento' => Yii::t('app', 'Direccion Viento'),
            'velocidad_viento' => Yii::t('app', 'Velocidad Viento'),
            'estado_mar' => Yii::t('app', 'Estado Mar'),
            'presion_barometrica' => Yii::t('app', 'Presion Barometrica'),
            'tipo_fondo' => Yii::t('app', 'Tipo Fondo'),
            'abertura_horiz_red' => Yii::t('app', 'Abertura Horiz Red'),
            'tamanio_red' => Yii::t('app', 'Tamanio Red'),
            'cajones_diversidad' => Yii::t('app', 'Cajones Diversidad'),
            'total_cajones' => Yii::t('app', 'Total Cajones'),
            'geography' => Yii::t('app', 'Geography'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCajones()
    {
        return $this->hasMany(\app\models\Cajones::className(), ['lance_id' => 'id_lance']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapturas()
    {
        return $this->hasMany(\app\models\Captura::className(), ['lance_id' => 'id_lance']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfoDiversidads()
    {
        return $this->hasMany(\app\models\InfoDiversidad::className(), ['lance_id' => 'id_lance']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampania()
    {
        return $this->hasOne(\app\models\Campania::className(), ['id_campania' => 'campania_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmuestras()
    {
        return $this->hasMany(\app\models\Submuestra::className(), ['lance_id' => 'id_lance']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallaSexoPlantillas()
    {
        return $this->hasMany(\app\models\TallaSexoPlantilla::className(), ['lance_id' => 'id_lance']);
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
     * @return \app\models\LanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\LanceQuery(get_called_class());
    }
}
