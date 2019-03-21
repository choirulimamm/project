<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kepala */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kepala', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-body">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
        ],
    ]) ?>

</div>
