<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DateTimePicker;

/** @var yii\web\View $this */
/** @var common\models\Investment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="investment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'investment_date')->widget(DateTimePicker::classname(), [
        'name' => 'investment_date',
        'type' => DateTimePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'  => true,
            'todayBtn' => true,
            'todayHighlight' => true,
            //'format' => 'dd-M-yyyy'
        ]
    ])->label('Select date & time');?>

    <?= $form->field($model, 'investment_type_fk')->widget(
        Select2::classname(),
        [
            'data' => ArrayHelper::map(\common\models\InvestmentType::find()->all(), 'investment_type_id', 'investment_type_title'),
            'options' => ['placeholder' => 'Select a Investment Type ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    ); ?>

    <?= $form->field($model, 'investment_amount')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
