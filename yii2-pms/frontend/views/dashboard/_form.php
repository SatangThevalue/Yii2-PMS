<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Dashboard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dashboard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dashboard_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dashboard_value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dashboard_details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
