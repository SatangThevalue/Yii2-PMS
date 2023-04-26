<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Expensescategory;
use kartik\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\number\NumberControl;

/** @var yii\web\View $this */
/** @var common\models\Expenses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= #$form->field($model, 'expenses_type')->textarea(['rows' => 6]) 
    '<label class="form-label">ชนิดค่าใช้จ่าย</label>';
    ?>
    <?= Select2::widget([
        'name' => 'expenses_type',
        'model' => $model,
        'attribute' => 'expenses_type',
        'data' => [0 => "รายจ่าย", 2 => "รายรับ"],
        'options' => [
            'placeholder' => 'โปรดระบุชนิดค่าใช้จ่าย ...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <?= '<label class="form-label">วันที่ทำธุรกรรม</label>'; ?>
    <?= #$form->field($model, 'expenses_category_date')->textInput() 
    DateTimePicker::widget(
        [
            'name' => 'expenses_category_date',
            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
            #'value' => '23-Feb-1982 10:01',
            'pluginOptions' => [
                'todayBtn' => true,
                'language' => 'th',
                'autoclose' => true,
                'format' => 'dd-MM-yyyy hh:ii'
            ],
        ]
    )
    ?>


    <?= '<label class="form-label">ประเภทค่าใช้จ่าย</label>'; ?>
    <?= Select2::widget([
        'name' => 'expenses_category_Fk',
        'model' => $model,
        'attribute' => 'expenses_category_Fk',
        'data' => ArrayHelper::map(Expensescategory::find()->all(), 'expenses_category_id', 'expenses_category_title'),
        'options' => ['placeholder' => 'โปรดระบุประเภทค่าใช้จ่าย ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?= '<label class="form-label">จำนวนเงิน</label>'; ?>
    <?= #$form->field($model, 'expenses_amount')->textInput(['maxlength' => true]) 
    NumberControl::widget([
        'name' => 'expenses_amount',
        #'value' => 20322.22,
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>