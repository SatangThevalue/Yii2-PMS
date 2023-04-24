<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\DashboardSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dashboard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dashboard_id') ?>

    <?= $form->field($model, 'dashboard_key') ?>

    <?= $form->field($model, 'dashboard_value') ?>

    <?= $form->field($model, 'dashboard_details') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
