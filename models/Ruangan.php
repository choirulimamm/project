<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruangan".
 *
 * @property integer $id
 * @property integer $id_lokasi
 * @property string $nama_ruangan
 */
class Ruangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ruangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lokasi'], 'integer'],
            [['nama_ruangan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lokasi' => 'Lokasi',
            'nama_ruangan' => 'Nama Ruangan',
        ];
    }
    public function getListLokasi(){
        $list_lokasi = Lokasi::find()->orderBy('nama_lokasi')->all();
        $list_data = \yii\helpers\ArrayHelper::map($list_lokasi,'id', 'nama_lokasi');
        return $list_data;
    }
    
    public function getLokasi(){
        return $this->hasOne(Lokasi::className(),['id'=>'id_lokasi']);
    }
     public function getDetail(){
        return $this->hasOne(DetailTransaksi::className(),['id_barang'=>'id']);
    }
}
