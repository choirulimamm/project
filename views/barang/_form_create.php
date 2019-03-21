<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

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
    
    <?php
    DatePicker::widget([
        'model'=>$model,
        'attribute'=>'tgl_perolehan',
        'dateFormat'=>'yyyy-MM-dd',
        'clientOptions'=>[
            'changeYear'=>true,
            'changeMonth'=>true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'asal_perolehan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rupiah_asset')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
