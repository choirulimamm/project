<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kepala */

$this->title = 'Update Kepala:';
$this->params['breadcrumbs'][] = ['label' => 'Kepala', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
