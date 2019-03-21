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
</table>

<?php if ($transaksi): ?>
    <div class="box box-body"> 
        <?php if($model->tgl_akhir): ?>
        <p> <h2><center>Laporan Penempatan Barang</center></h2>
        <h3><center>Periode : <?= Yii::$app->formatter->asDate($model->tgl_awal, 'php:d-M-Y') .
    ' s/d ' . Yii::$app->formatter->asDate($model->tgl_akhir, 'php:d-M-Y')
    ?>
            </center></h3></p>
            <?php else: ?>
            <p> <h2><center>Laporan Penempatan Barang</center></h2>
        <h3><center>Periode : <?= Yii::$app->formatter->asDate($model->tgl_awal, 'php:d-M-Y');
    ?>
            </center></h3></p>
            <?php    endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Penempatan</th>
                <th>Penanggung Jawab </th>
                <th>Lokasi</th>
                <th>Ruangan</th>
                <th>No Inventaris</th>
                <th>Jenis Barang</th>
                <th>Merk Barang</th>
                <th>Model Barang</th>
            </tr>
        </thead>
            <?php $no = 1; ?>
        <tbody>
                <?php foreach ($transaksi as $tran): ?>
                <tr>
                    <?php
                    $total_detail = count($tran->details);
                    $frst = 1;
                    ?>

                    <td rowspan="<?= $total_detail ?>"><?= $no++ ?></td>
                    <td rowspan="<?= $total_detail ?>"><?= $tran->tgl_permintaan ?></td>
                    <td rowspan="<?= $total_detail ?>"><?= $tran->pj_lokasi ?></td>
                    <td rowspan="<?= $total_detail ?>"><?= $tran->lokasi->nama_lokasi ?></td>
                    <?php foreach ($tran->details as $detail): ?>
                        <?php if ($total_detail >= 2) { ?>
                <?php if ($frst == 1) : ?>
                                <td><?php echo $detail->ruangan->nama_ruangan ?> </td>
                                <td><?php echo $detail->barang->no_inventaris ?> </td>
                                <td><?php echo $detail->barang->jenis_barang ?> </td>
                                <td><?php echo $detail->barang->merk_barang ?> </td>
                                <td><?php echo $detail->barang->model_barang ?> </td>
                                <?php $frst = 2 ?>
                <?php else : ?> 
                            <tr>
                                <td><?php echo $detail->ruangan->nama_ruangan ?> </td>
                                <td><?php echo $detail->barang->no_inventaris ?> </td>
                                <td><?php echo $detail->barang->jenis_barang ?> </td>
                                <td><?php echo $detail->barang->merk_barang ?> </td>
                                <td><?php echo $detail->barang->model_barang ?> </td>
                            </tr>    
                        <?php endif; ?> 
            <?php } else { ?>    
                    <td><?php echo $detail->ruangan->nama_ruangan ?> </td>
                    <td><?php echo $detail->barang->no_inventaris ?> </td>
                    <td><?php echo $detail->barang->jenis_barang ?> </td>
                    <td><?php echo $detail->barang->merk_barang ?> </td>
                    <td><?php echo $detail->barang->model_barang ?> </td>
                <?php } ?>
            <?php endforeach; ?>
            </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
    </div>

<?php endif; ?>
