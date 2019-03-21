<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lokasi */

$this->title = 'Tambah Lokasi';
$this->params['breadcrumbs'][] = ['label' => 'Lokasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
