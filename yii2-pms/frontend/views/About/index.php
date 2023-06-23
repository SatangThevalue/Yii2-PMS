<?php

/** @var yii\web\View $this */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-body row">
    <div class="col-5 text-center d-flex align-items-center justify-content-center">
        <div class="">
            <img src="<?= Yii::$app->request->baseUrl; ?>/img/20210202-logoRMUTT-color-01.png" width="150" height="275"><br>
            <img src="<?= Yii::$app->request->baseUrl; ?>/img/230px-RMUTT-logo-01.png" width="229" height="85">
            <h2>Rajamangala University of Technology Thanyaburi</h2>
            <p class="lead mb-5">39 Moo 1 Rangsit-Nakorn Nayok Rd.,<br> Klong 6, Klong Luang,<br> 12110, Pathum Thani,<br> Thailand</p>
        </div>
    </div>
    <div class="col-7">
        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Pongpon Nilaphruek</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?= Yii::$app->request->baseUrl; ?>/img/1649739364906.jpg" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h5 class="description-header">Assistant Professor</h5>
                            <span class="description-text">FACULTY : Science and Technology</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Thanaphol Nantakaset</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?= Yii::$app->request->baseUrl; ?>/img/1686201790688.jpg" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <h5 class="description-header">Student</h5>
                            <span class="description-text">FACULTY : Science and Technology<br>PROGRAM : Big Data Management and Analytics</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>