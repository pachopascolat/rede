<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "vw_diversidad_con_lances".
 *
 * @property integer $id_info_diversidad
 * @property string $lance_id
 * @property integer $especie_id
 * @property double $cant_individuos
 * @property double $peso_total
 * @property integer $cajon_id
 * @property string $transecta
 * @property string $nombre_vulgar
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
 */
class VwDiversidadConLances extends \yii\db\ActiveRecord
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
            [['id_info_diversidad', 'especie_id', 'cajon_id', 'estrato_id', 'estado_mar'], 'integer'],
            [['cant_individuos', 'peso_total', 'latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final', 'prof_inicial', 'prof_final', 'velocidad_arrastre', 'rumbo', 'distancia_recorrida', 'cable_filado_popa', 'longitud_red', 'longitud_bridas', 'longitud_patentes', 'distancia_pastecas', 'diferencia_pastecas', 'distancia_portones', 'distancia_punta_alas', 'abertura_vertical_red', 'temp_superficie', 'temp_fondo', 'velocidad_viento', 'presion_barometrica', 'abertura_horiz_red', 'tamanio_red', 'cajones_diversidad', 'total_cajones'], 'number'],
            [['transecta', 'geography'], 'string'],
            [['fecha', 'hora_inicio', 'hora_fin', 'tiempo_arrastre'], 'safe'],
            [['lance_id', 'id_lance', 'campania_id', 'nombre', 'direccion_viento', 'tipo_fondo'], 'string', 'max' => 20],
            [['nombre_vulgar'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_diversidad_con_lances';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_info_diversidad' => Yii::t('app', 'Id Info Diversidad'),
            'lance_id' => Yii::t('app', 'Lance ID'),
            'especie_id' => Yii::t('app', 'Especie ID'),
            'cant_individuos' => Yii::t('app', 'Cant Individuos'),
            'peso_total' => Yii::t('app', 'Peso Total'),
            'cajon_id' => Yii::t('app', 'Cajon ID'),
            'transecta' => Yii::t('app', 'Transecta'),
            'nombre_vulgar' => Yii::t('app', 'Nombre Vulgar'),
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
                'column' => 'id_diversidad_con_lance',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\VwDiversidadConLancesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\VwDiversidadConLancesQuery(get_called_class());
    }
}
