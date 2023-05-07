<?php

use yii\helpers\ArrayHelper;

$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Learning Unsuccessful</span>
                <span class="info-box-number">
                    <?= \Yii::$app->formatter->asDecimal($learning->getCountLearningStatusNo()); ?>
                </span>
            </div>

        </div>

    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">To Do List Unsuccessful</span>
                <span class="info-box-number">
                <?= \Yii::$app->formatter->asDecimal($todolist->getCountTodolistStatusNo()); ?>
                </span>
            </div>

        </div>

    </div>


    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Working Unsuccessful</span>
                <span class="info-box-number">
                <?= \Yii::$app->formatter->asDecimal($working->getCountWorkingStatusNo()); ?>
                </span>
            </div>

        </div>

    </div>
</div>

