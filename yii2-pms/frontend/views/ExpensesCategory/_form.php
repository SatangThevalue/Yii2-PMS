<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ExpensesCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expenses-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'expenses_category_title')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
