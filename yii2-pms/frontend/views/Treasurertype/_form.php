<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Treasurertype $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="treasurertype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'treasurer_type_title')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
