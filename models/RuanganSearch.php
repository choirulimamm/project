<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ruangan;

/**
 * RuanganSearch represents the model behind the search form about `app\models\Ruangan`.
 */
class RuanganSearch extends Ruangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama_ruangan', 'id_lokasi'], 'safe'],
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
        $query = Ruangan::find();
          $query->joinWith(['lokasi']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
         $dataProvider->sort->attributes['lokasi'] = [
            'asc' => ['lokasi.nama_lokasi' => SORT_ASC],
            'desc' => ['lokasi.nama_lokasi' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           
        ])
        ->andFilterWhere(['like', 'nama_ruangan', $this->nama_ruangan])
        ->andFilterWhere(['like', 'lokasi.nama_lokasi', $this->id_lokasi]);
        return $dataProvider;
    }
}
