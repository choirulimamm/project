<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<script>
    window.load = print_d();
    function print_d() {
        window.print();
    }
</script>
<?php
    $this->title = '';
?>

<table width="100%">
    <tr>
        <td width="25" align="center"><?= \yii\helpers\Html::img("@web/img/logo.png",['width'=>'100px','height'=>'100px']) ?></td>
        <td width="50" align="center"><p><h3>KEMENTRIAN ENERGI DAN SUMBER DAYA MINERAL<br />
                REPUBLIK INDONESIA<br />
                <b>BADAN GEOLOGI</b></h3>
            <h4>JALAN DIPONEGORO NOMOR 57 BANDUNG 40122<br />
            JALAN JENDRAL GATOT SUBROTO KAV.49 JAKARTA 12950</h4> </p>
        </td>
        <td width="25" align="center"><img src="" width="100%"></td>
    </tr>
</table><br />
<h2><center>BON PENEMPATAN</center> </h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'pj_lokasi',
            'lokasi.nama_lokasi',
            'tgl_permintaan',
//            'user.username',
//            'status',
        ],
    ]) ?>

<br />

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
<br /><br />
<table class="table">
    <thead>
    <tr>
        <td width="50%" align="">Kepala BMN</td>
        <td width="50%" align="right">Penanggung Jawab Lokasi </td>
    </tr>
    <tbody>
        <tr>
            <td rowspan="5">&nbsp;</td>
            <td rowspan="5">&nbsp;</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td width="50%" align=""><u><b><?= $model->getKepala() ?></u></b></td>
            <td width="50%" align="right"><u><b><?= $model->pj_lokasi ?></u></b> </td>
        </tr>
    </tfoot>
    
    </thead>
    
</table>

