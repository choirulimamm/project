<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>

  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pj_lokasi',
            'lokasi.nama_lokasi',
            'tgl_permintaan',
            'user.username',
//            'status',
        ],
    ]) ?>

</div>
<br />
<div class="box box-body">
<h2>List Barang </h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Ruangan</th>
            <th>No Inventaris </th>
            <th>Jenis Barang </th>
            <th>Merk Barang </th>
            <th>Model Barang </th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php         foreach ($model->details as $detail): ?>
        <tr>
            <td> <?= $no++ ?> </td>
            <td> <?= $detail->ruangan->nama_ruangan ?> </td>
            <td> <?= $detail->barang->no_inventaris ?> </td>
            <td> <?= $detail->barang->jenis_barang ?> </td>
            <td> <?= $detail->barang->merk_barang ?> </td>
            <td> <?= $detail->barang->model_barang ?> </td>
        </tr>
        
        <?php         endforeach; ?>


         
        
        
    </tbody>
    
</table>
</div>