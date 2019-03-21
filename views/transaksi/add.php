<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use mdm\widgets\TabularInput;


$this->title = 'Tambah Transaksi';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-form">

    


<div class="box box-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="form-group">

        <?php $form = ActiveForm::begin(); ?>

        <?php if ($screen == 1): ?>
            <?= $form->field($model_head, 'pj_lokasi')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model_head, 'id_lokasi')->dropDownList($model_head->getListLokasi()) ?>

            <?= $form->field($model_head, 'tgl_permintaan')->textInput() ?>
            <?php
            DatePicker::widget([
                'model' => $model_head,
                'attribute' => 'tgl_permintaan',
                'dateFormat' => 'yyyy-MM-dd',
                'clientOptions' => [
                    'changeYear' => true,
                    'changeMonth' => true,
                ],
            ]);
            ?>

            <div class="form-group">
                <?= Html::submitButton('Tambah Barang', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php elseif ($screen == 2): ?> 
   
             <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="">Penanggung Jawab Ruangan</th>
                            <td class=""> <?php echo $model_head->pj_lokasi ?> </td>
                            
                        </tr>
                        <tr>
                            <th class="">Lokasi</th>
                            <td class=""> <?php echo $model_head->lokasi->nama_lokasi ?> </td>
                            
                        </tr>
                        <tr>
                            <th class="">Tanggal Permintaan</th>
                            <td class=""> <?php echo $model_head->tgl_permintaan ?> </td>
                            
                        </tr>
                    </thead>
             </table>
        
        <?php ActiveForm::end(); ?>
         </div>
</div>
    <div class="box box-body">
        
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model_head, 'pj_lokasi')->hiddenInput(['maxlength' => true])->label(false) ?>

            <?= $form->field($model_head, 'id_lokasi')->hiddenInput()->label(false) ?>

            <?= $form->field($model_head, 'tgl_permintaan')->hiddenInput()->label(false) ?>

            <div class="form-group">

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Barang</th>
                            <th class="text-right"><a id="btn-add"><span class="btn btn-success">+</span></a></th>
                        </tr>
                    </thead>
                    <?php
                    echo TabularInput::widget([
                        'id' => 'detail-grid',
                        'allModels' => $model_head->details,
                        'model' => $model_detail,
                        'tag' => 'tbody',
                        'form' => $form,
                        'itemOptions' => ['tag' => 'tr'],
                        'itemView' => 'item_detail',
                        'clientOptions' => [
                            'btnAddSelector' => '#btn-add',
                        ]
                    ]);
                    ?>
                </table>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php endif; ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>
