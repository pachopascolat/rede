<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VwTallaSexo;

/**
 * app\models\VwTallaSexoSearch represents the model behind the search form about `app\models\VwTallaSexo`.
 */
 class VwTallaSexoSearch extends VwTallaSexo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'especie_id', 'talla', 'Hembras', 'Machos', 'Indeterminado'], 'integer'],
            [['lance_id', 'nombre_vulgar', 'id_campania'], 'safe'],
            [['latitud_inicial', 'longitud_inicial', 'latitud_final', 'longitud_final'], 'number'],
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
        $query = VwTallaSexo::find();

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
            'id' => $this->id,
            'especie_id' => $this->especie_id,
            'talla' => $this->talla,
            'Hembras' => $this->Hembras,
            'Machos' => $this->Machos,
            'Indeterminado' => $this->Indeterminado,
            'latitud_inicial' => $this->latitud_inicial,
            'longitud_inicial' => $this->longitud_inicial,
            'latitud_final' => $this->latitud_final,
            'longitud_final' => $this->longitud_final,
        ]);

        $query->andFilterWhere(['like', 'lance_id', $this->lance_id])
            ->andFilterWhere(['like', 'nombre_vulgar', $this->nombre_vulgar])
            ->andFilterWhere(['like', 'id_campania', $this->id_campania]);

        return $dataProvider;
    }
}
