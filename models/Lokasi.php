<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lokasi".
 *
 * @property integer $id
 * @property string $nama_lokasi
 */
class Lokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lokasi'], 'string', 'max' => 50],
              [['nama_lokasi'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lokasi' => 'Nama Lokasi',
        ];
    }
     public function getDataRuangan(){
        return $this->hasMany(Ruangan::className(),['id_lokasi'=>'id']);
    }
     public function getTransaksi(){
        return $this->hasMany(Transaksi::className(),['id_lokasi'=>'id']);
    }
}
