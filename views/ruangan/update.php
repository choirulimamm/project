<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ruangan */

$this->title = 'Update Ruangan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
