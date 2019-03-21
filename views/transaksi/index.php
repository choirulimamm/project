<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
    <?= Html::a('Tambah Transaksi', ['add-transaksi'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <br />
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'pj_lokasi',
            [
                'attribute' => 'id_lokasi',
                'value' => function($data) {
                    return $data->lokasi->nama_lokasi;
                }
            ],
            'tgl_permintaan',
//            'user_id',
            // 'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'print' => function ($url, $model) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-print"></span>', 
                                ['bon', 'id' => $model->id], [
                                    'title' => 'Print',
                                    'data-pjax' => '0',
                                        ]
                        );
                    },
                ],
                'template' => '{view}    {print}',
            ],
        ],
    ]);
    ?>
</div>
