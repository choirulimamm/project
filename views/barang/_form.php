<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_inventaris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merk_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_perolehan')->textInput() ?>

    <?= $form->field($model, 'asal_perolehan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rupiah_asset')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
