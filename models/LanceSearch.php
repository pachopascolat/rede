<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lance;

/**
 * app\models\LanceSearch represents the model behind the search form about `app\models\Lance`.
 */
 class LanceSearch extends Lance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lance', 'fecha', 'campania_id', 'nombre', 'hora_inicio', 'hora_fin', 'tiempo_arrastre', 'direccion_viento', 'tipo_fondo', 'geography'], 'safe'],
            [['estrato_id', 'estado_mar'], 'integer'],
            [['latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final', 'prof_inicial', 'prof_final', 'velocidad_arrastre', 'rumbo', 'distancia_recorrida', 'cable_filado_popa', 'longitud_red', 'longitud_bridas', 'longitud_patentes', 'distancia_pastecas', 'diferencia_pastecas', 'distancia_portones', 'distancia_punta_alas', 'abertura_vertical_red', 'temp_superficie', 'temp_fondo', 'velocidad_viento', 'presion_barometrica', 'abertura_horiz_red', 'tamanio_red', 'cajones_diversidad', 'total_cajones'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lance::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'fecha' => $this->fecha,
            'estrato_id' => $this->estrato_id,
            'latitud_inicial' => $this->latitud_inicial,
            'longitud_inicial' => $this->longitud_inicial,
            'latitud_final' => $this->latitud_final,
            'longitud_final' => $this->longitud_final,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'prof_inicial' => $this->prof_inicial,
            'prof_final' => $this->prof_final,
            'tiempo_arrastre' => $this->tiempo_arrastre,
            'velocidad_arrastre' => $this->velocidad_arrastre,
            'rumbo' => $this->rumbo,
            'distancia_recorrida' => $this->distancia_recorrida,
            'cable_filado_popa' => $this->cable_filado_popa,
            'longitud_red' => $this->longitud_red,
            'longitud_bridas' => $this->longitud_bridas,
            'longitud_patentes' => $this->longitud_patentes,
            'distancia_pastecas' => $this->distancia_pastecas,
            'diferencia_pastecas' => $this->diferencia_pastecas,
            'distancia_portones' => $this->distancia_portones,
            'distancia_punta_alas' => $this->distancia_punta_alas,
            'abertura_vertical_red' => $this->abertura_vertical_red,
            'temp_superficie' => $this->temp_superficie,
            'temp_fondo' => $this->temp_fondo,
            'velocidad_viento' => $this->velocidad_viento,
            'estado_mar' => $this->estado_mar,
            'presion_barometrica' => $this->presion_barometrica,
            'abertura_horiz_red' => $this->abertura_horiz_red,
            'tamanio_red' => $this->tamanio_red,
            'cajones_diversidad' => $this->cajones_diversidad,
            'total_cajones' => $this->total_cajones,
        ]);

        $query->andFilterWhere(['like', 'id_lance', $this->id_lance])
            ->andFilterWhere(['like', 'campania_id', $this->campania_id])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion_viento', $this->direccion_viento])
            ->andFilterWhere(['like', 'tipo_fondo', $this->tipo_fondo])
            ->andFilterWhere(['like', 'geography', $this->geography]);

        return $dataProvider;
    }
}
