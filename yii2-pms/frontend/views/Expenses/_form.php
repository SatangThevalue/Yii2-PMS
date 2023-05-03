<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DateTimePicker;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Expenses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'expenses_type')->widget(
        Select2::classname(),
        [
            'data' => ArrayHelper::map(\common\models\Expensestype::find()->all(), 'expenses_type_id', 'expenses_type_title'),
            'options' => ['placeholder' => 'Select a Expenses ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?>
    <?=
    $form->field($model, 'expenses_category_date')->widget(DateTimePicker::classname(), [
        'name' => 'expenses_category_date',
        'type' => DateTimePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'  => true,
            'todayBtn' => true,
            'todayHighlight' => true,
            //'format' => 'dd-M-yyyy'
        ]
    ])->label('Select date & time');
    ?>

    <?= $form->field($model, 'expenses_category_Fk')->widget(
        Select2::classname(),
        [
            'data' => ArrayHelper::map(\common\models\Expensescategory::find()->all(), 'expenses_category_id', 'expenses_category_title'),
            'options' => ['placeholder' => 'Select a Expenses Category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    ); ?>

    <?= $form->field($model, 'expenses_amount')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>