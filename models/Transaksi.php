<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property integer $id
 * @property string $pj_lokasi
 * @property integer $id_lokasi
 * @property string $tgl_permintaan
 * @property integer $user_id
 * @property string $status
 */
class Transaksi extends \yii\db\ActiveRecord
{
    public $tgl_awal;
    public $tgl_akhir;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lokasi', 'user_id'], 'integer'],
            [['tgl_permintaan','tgl_awal','tgl_akhir'], 'safe'],
            [['pj_lokasi', 'status'], 'string', 'max' => 50],
            [['user_id','pj_lokasi', 'tgl_permintaan'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pj_lokasi' => 'Penanggung Jawab Lokasi',
            'id_lokasi' => 'Lokasi',
            'tgl_permintaan' => 'Tanggal Permintaan',
            'user_id' => 'User ID',
            'status' => 'Status',
            'tgl_awal'=>'Tanggal Awal',
            'tgl_akhir'=>'Tanggal Akhir',
        ];
    }
    
     public function getListLokasi(){
        $list_lokasi = Lokasi::find()->orderBy('nama_lokasi')->all();
        $list_data = \yii\helpers\ArrayHelper::map($list_lokasi,'id', 'nama_lokasi');
        return $list_data;
    }
    public function getDetails(){
        return $this->hasMany(DetailTransaksi::className(),['id_transaksi'=>'id']);
    }
    
     public function getListRuangan(){
        $list_ruangan = Ruangan::find()->where(['id_lokasi'=>$this->id_lokasi])->orderBy('nama_ruangan')->all();
        $list_data = \yii\helpers\ArrayHelper::map($list_ruangan,'id', 'nama_ruangan');
        return $list_data;
    }
    
    public function getListBarang(){
        $list_barang = Barang::find()->where(['status'=>'tersedia'])->orderBy('no_inventaris')->all();
        $list_data = \yii\helpers\ArrayHelper::map($list_barang,'id', "no_inventaris" );
        return $list_data;
    }
     public function getLokasi(){
        return $this->hasOne(Lokasi::className(),['id'=>'id_lokasi']);
    }
     public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }
    public function getKepala(){
        $kepala = Kepala::find()->orderBy(['id'=>SORT_DESC])->one();
        if ($kepala){
            return $kepala->nama;
        }else{
            return "";
        }
    }
    
    
}
