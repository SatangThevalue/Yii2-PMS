<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= \yii\helpers\Url::home() ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= \yii\helpers\Url::toRoute('about/index') ?>" class="nav-link">About</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <?php
        if (!Yii::$app->user->isGuest) {
        ?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= \yii\helpers\Url::to('http://localhost:8889/') ?>" class="nav-link">Back End</a>
            </li>
            </li>
            <li class="nav-item">
                <?= Html::a('<i class="fas fa-sign-out-alt">ออกจากระบบ</i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
            </li>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>
<!-- /.navbar -->