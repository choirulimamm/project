<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailTransaksi;

/**
 * DetailTransaksiSearch represents the model behind the search form about `app\models\DetailTransaksi`.
 */
class DetailTransaksiSearch extends DetailTransaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_transaksi', 'id_ruangan', 'id_barang'], 'integer'],
            [['status'], 'safe'],
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
        $query = DetailTransaksi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_transaksi' => $this->id_transaksi,
            'id_ruangan' => $this->id_ruangan,
            'id_barang' => $this->id_barang,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
