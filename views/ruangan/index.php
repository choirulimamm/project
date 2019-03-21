<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RuanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Tambah Ruangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <br />
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
               [
        	'attribute' => 'id_lokasi',
        	'value' => function($data) {
        		return $data->lokasi->nama_lokasi;
        	}
        ],
            'nama_ruangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
