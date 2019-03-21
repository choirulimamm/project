<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lokasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_lokasi',
        ],
    ]) ?>

</div>
<div class="box box-body">
 <h1>Data Ruangan</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ruangan </th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php         foreach ($model->dataRuangan as $ruangan): ?>
        <tr>
            <td> <?= $no++ ?> </td>
            <td> <?= $ruangan->nama_ruangan ?> </td>
        </tr>
        <?php         endforeach; ?>


         
        
        
    </tbody>
    
</table>
</div>
