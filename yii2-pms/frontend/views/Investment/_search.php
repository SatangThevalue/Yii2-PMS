<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\InvestmentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="investment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'investment_id') ?>

    <?= $form->field($model, 'investment_date') ?>

    <?= $form->field($model, 'investment_type_fk') ?>

    <?= $form->field($model, 'investment_amount') ?>

    <?= $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
