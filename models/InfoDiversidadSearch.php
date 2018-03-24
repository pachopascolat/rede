<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InfoDiversidad;

/**
 * app\models\InfoDiversidadSearch represents the model behind the search form about `app\models\InfoDiversidad`.
 */
 class InfoDiversidadSearch extends InfoDiversidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_info_diversidad', 'especie_id', 'cajon_id'], 'integer'],
            [['lance_id', 'transecta'], 'safe'],
            [['cant_individuos', 'peso_total'], 'number'],
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
        $query = InfoDiversidad::find();

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
            'id_info_diversidad' => $this->id_info_diversidad,
            'especie_id' => $this->especie_id,
            'cant_individuos' => $this->cant_individuos,
            'peso_total' => $this->peso_total,
            'cajon_id' => $this->cajon_id,
        ]);

        $query->andFilterWhere(['like', 'lance_id', $this->lance_id])
            ->andFilterWhere(['like', 'transecta', $this->transecta]);

        return $dataProvider;
    }
}
