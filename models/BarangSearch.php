<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Barang;

/**
 * BarangSearch represents the model behind the search form about `app\models\Barang`.
 */
class BarangSearch extends Barang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_inventaris', 'jenis_barang', 'merk_barang', 'model_barang', 'keterangan', 'tgl_perolehan', 'asal_perolehan', 'rupiah_asset', 'status'], 'safe'],
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
        $query = Barang::find();

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
            'tgl_perolehan' => $this->tgl_perolehan,
        ]);

        $query->andFilterWhere(['like', 'no_inventaris', $this->no_inventaris])
            ->andFilterWhere(['like', 'jenis_barang', $this->jenis_barang])
            ->andFilterWhere(['like', 'merk_barang', $this->merk_barang])
            ->andFilterWhere(['like', 'model_barang', $this->model_barang])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'asal_perolehan', $this->asal_perolehan])
            ->andFilterWhere(['like', 'rupiah_asset', $this->rupiah_asset])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
