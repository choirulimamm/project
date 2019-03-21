<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'no_inventaris',
            'jenis_barang',
            'merk_barang',
            'model_barang',
            // 'keterangan',
            // 'tgl_perolehan',
            // 'asal_perolehan',
            // 'rupiah_asset',
//             'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
