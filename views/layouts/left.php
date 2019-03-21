<?php
    $user = app\models\User::findIdentity(Yii::$app->user->id);
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/../../img/logo.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $user->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

       
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu ', 'options' => ['class' => 'header']],
                      ['label' => 'Beranda', 'icon' => 'dashboard', 'url' => ['site/index'],],
                    [
                        'label' => 'Barang Milik Negara',
                        'icon' => 'file-text',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Tambah Barang', 'icon' => 'plus', 'url' => ['/barang/create'],],
                            ['label' => 'Data Barang', 'icon' => 'tasks', 'url' => ['/barang'],],
                            
                        ],
                    ],
                    
                    [
                        'label' => 'Lokasi',
                        'icon' => 'map-marker',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Tambah Lokasi', 'icon' => 'plus', 'url' => ['/lokasi/create'],],
                            ['label' => 'Data Lokasi', 'icon' => 'tasks', 'url' => ['/lokasi'],],
                           
                        ],
                    ],
                    
                     [
                                'label' => 'Ruangan',
                                'icon' => 'institution',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Tambah Ruangan', 'icon' => 'plus', 'url' => ['/ruangan/create'],],
                                    ['label' => 'Data Ruangan', 'icon' => 'tasks', 'url' => ['/ruangan'],],

                                ],
                            ],
                    
                    
                    [
                        'label' => 'Transaksi Penempatan',
                        'icon' => 'stack-overflow',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Tambah Transaksi', 'icon' => 'plus', 'url' => ['/transaksi/add-transaksi'],],
                            ['label' => 'Data Transaksi', 'icon' => 'tasks', 'url' => ['/transaksi'],],
                            
                        ],
                    ],
                    ['label' => 'Laporan', 'icon' => ' fa-file-text-o', 'url' => ['/transaksi/report'],],
                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'Kepala BMN', 'icon' => 'users', 'url' => ['kepala/index'],],
                ],
            ]
        ) ?>

    </section>

</aside>
