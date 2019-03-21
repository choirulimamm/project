<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi;

/**
 * TransaksiSearch represents the model behind the search form about `app\models\Transaksi`.
 */
class TransaksiSearch extends Transaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['pj_lokasi', 'tgl_permintaan','id_lokasi', 'status'], 'safe'],
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
        $query = Transaksi::find();

        // add conditions that should always apply here

   
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
            'tgl_permintaan' => $this->tgl_permintaan,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'pj_lokasi', $this->pj_lokasi])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'lokasi.nama_lokasi', $this->id_lokasi]);

        return $dataProvider;
    }
}
