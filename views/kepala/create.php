<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kepala */

$this->title = 'Create Kepala';
$this->params['breadcrumbs'][] = ['label' => 'Kepalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
