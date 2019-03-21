<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_transaksi".
 *
 * @property integer $id
 * @property integer $id_transaksi
 * @property integer $id_ruangan
 * @property integer $id_barang
 * @property string $status
 */
class DetailTransaksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $id_lokasi;
    public static function tableName()
    {
        return 'detail_transaksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_ruangan', 'id_barang'], 'integer'],
            [['status'], 'string', 'max' => 50],
            [['id_barang'], 'unique'],
            [['id_transaksi', 'id_ruangan', 'id_barang'], 'required']
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_transaksi' => 'Id Transaksi',
            'id_ruangan' => 'Id Ruangan',
            'id_barang' => 'Id Barang',
            'status' => 'Status',
        ];
    }
    public function getListRuangan(){
        $list_ruangan = Ruangan::find()->where(['id_lokasi'=>$this->id_lokasi])->orderBy('nama_ruangan')->all();
        $list_data = \yii\helpers\ArrayHelper::map($list_ruangan,'id', 'nama_ruangan');
        return $list_data;
    }
    
    public function getListBarang(){
        $list_barang = Barang::find()->where(['status'=>'tersedia'])->orderBy('no_inventaris')->all();
        $list_data = \yii\helpers\ArrayHelper::map($list_barang,'id', 
            function($list_barang) {
                return $list_barang->no_inventaris.' - '.$list_barang->jenis_barang
                        .' - '. $list_barang->merk_barang .' - ' . $list_barang->model_barang;
            } );
        return $list_data;
    }
    public function getRuangan(){
        return $this->hasOne(Ruangan::className(),['id'=>'id_ruangan']);
    }
    public function getBarang(){
        return $this->hasOne(Barang::className(),['id'=>'id_barang']);
    }
}
