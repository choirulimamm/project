<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property integer $id
 * @property string $no_inventaris
 * @property string $jenis_barang
 * @property string $merk_barang
 * @property string $model_barang
 * @property string $keterangan
 * @property string $tgl_perolehan
 * @property string $asal_perolehan
 * @property string $rupiah_asset
 * @property string $status
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_perolehan'], 'safe'],
            [['no_inventaris', 'jenis_barang', 'merk_barang', 'model_barang', 'keterangan', 'asal_perolehan', 'rupiah_asset', 'status'], 'string', 'max' => 50],
            [['no_inventaris'], 'unique'],
            [['no_inventaris', 'jenis_barang', 'merk_barang', 'model_barang'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_inventaris' => 'No Inventaris',
            'jenis_barang' => 'Jenis Barang',
            'merk_barang' => 'Merk Barang',
            'model_barang' => 'Model Barang',
            'keterangan' => 'Keterangan',
            'tgl_perolehan' => 'Tgl Perolehan',
            'asal_perolehan' => 'Asal Perolehan',
            'rupiah_asset' => 'Rupiah Asset',
            'status' => 'Status',
        ];
    }
    public function getDetail(){
        return $this->hasOne(DetailTransaksi::className(),['id_barang'=>'id']);
    }
}
