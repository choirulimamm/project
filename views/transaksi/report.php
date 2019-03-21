<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */

$this->title = 'Report Transaksi';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="transaksi-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tgl_awal')->textInput() ?>
        <?php
        DatePicker::widget([
            'model' => $model,
            'attribute' => 'tgl_awal',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
            ],
        ]);
        ?>
        <?= $form->field($model, 'tgl_akhir')->textInput() ?>
        <?php
        DatePicker::widget([
            'model' => $model,
            'attribute' => 'tgl_akhir',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
            ],
        ]);
        ?>
        <?= $form->field($model, 'id_lokasi')->dropDownList($model->getListLokasi(), ['prompt' => 'Semua Lokasi']) ?>
        <div class="form-group">
            <?= Html::submitButton('View', ['name' => 'view', 'value' => 'view', 'class' => 'btn btn-primary']) ?>
            <?= Html::submitButton('Print', ['name' => 'print', 'value' => 'print', 'class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div >

<?php if ($transaksi): ?>
    <div class="box box-body">
        <?php if ($model->tgl_akhir): ?>
            <p> <h2><center>Laporan Penempatan Barang</center></h2>
            <h3><center>Periode : <?=
                    Yii::$app->formatter->asDate($model->tgl_awal, 'php:d-M-Y') .
                    ' s/d ' . Yii::$app->formatter->asDate($model->tgl_akhir, 'php:d-M-Y')
                    ?>
                </center></h3></p>
    <?php else: ?>
        <p> <h2><center>Laporan Penempatan Barang</center></h2>
        <h3><center>Periode : <?= Yii::$app->formatter->asDate($model->tgl_awal, 'php:d-M-Y');
        ?>
            </center></h3></p>
    <?php endif; ?>


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




