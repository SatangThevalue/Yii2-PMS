<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var common\models\Learning $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="learning-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'learning_note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'learning_status')->widget(
        Select2::classname(),
        [
            'data' => ['0'=> 'ยังไม่สำเสร็จ','1'=> 'สำเสร็จ'],
            'options' => ['placeholder' => 'Select a Status ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
