<td><?= $form->field($model,"[$key]id_ruangan")->dropDownList($model->getListRuangan())->label(false); ?></td>
<td><?= $form->field($model,"[$key]id_barang")->widget(kartik\select2\Select2::classname(), [
    'data' => $model->getListBarang(),
    'language' => 'en',
    'options' => ['placeholder' => 'Pilih Barang ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false); ?></td>
<td class="text-right"><a data-action="delete"><span class="btn btn-danger">x</span></a></td>