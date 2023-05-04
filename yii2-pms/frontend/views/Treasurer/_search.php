<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\TreasurerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="treasurer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'treasurer_id') ?>

    <?= $form->field($model, 'treasurer_note') ?>

    <?= $form->field($model, 'treasurer_amount') ?>

    <?= $form->field($model, 'treasurer_expenses_type_Fk') ?>

    <?= $form->field($model, 'treasurer_date') ?>

    <?php // echo $form->field($model, 'treasurer_category_Fk') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
