<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\ExpensesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expenses-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'expenses_id') ?>

    <?= $form->field($model, 'expenses_type') ?>

    <?= $form->field($model, 'expenses_category_date') ?>

    <?= $form->field($model, 'expenses_category_Fk') ?>

    <?= $form->field($model, 'expenses_amount') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
