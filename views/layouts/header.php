<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<?php
    $user = app\models\User::findIdentity(Yii::$app->user->id);
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">PSG</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
               
              
                <!-- Tasks: style can be found in dropdown.less -->
               
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/../../img/logo.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= $user->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/../../img/logo.png" class="img-circle"
                                 alt="User Image"/>
                            <p>
                            <!--<div class="pull-right">-->
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn-sm btn-danger']
                                ) ?>
                             <?= Html::a(
                                    'Add User',
                                    ['/user/index'],
                                    ['data-method' => 'post', 'class' => 'btn-sm btn-info']
                                ) ?>
                            <!--</div>-->
                            </p>
                        </li>
                        
                       
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
               
            </ul>
        </div>
    </nav>
</header>