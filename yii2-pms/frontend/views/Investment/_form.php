<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Investment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="investment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'investment_date')->textInput() ?>

    <?= $form->field($model, 'investment_type_fk')->textInput() ?>

    <?= $form->field($model, 'investment_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
