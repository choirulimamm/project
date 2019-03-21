<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailTransaksi */

$this->title = 'Update Detail Transaksi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-transaksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
