<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DateTimePicker;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Treasurer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="treasurer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'treasurer_note')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'treasurer_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'treasurer_expenses_type_Fk')->widget(
        Select2::classname(),
        [
            'data' => ArrayHelper::map(\common\models\TreasurerType::find()->all(), 'treasurer_type_id', 'treasurer_type_title'),
            'options' => ['placeholder' => 'Select a Expenses ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    ); ?>

    <?= $form->field($model, 'treasurer_date')->widget(DateTimePicker::classname(), [
        'name' => 'treasurer_date',
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'value' => date(time()),
        'pluginOptions' => [
            'autoclose'  => true,
            'todayBtn' => true,
            'todayHighlight' => true,
            //'format' => 'dd-M-yyyy'
        ]
    ])->label('Select date & time'); ?>

    <?= $form->field($model, 'treasurer_category_Fk')->widget(
        Select2::classname(),
        [
            'data' => ArrayHelper::map(\common\models\Treasurercategory::find()->all(), 'treasurer_category_id', 'treasurer_category_title'),
            'options' => ['placeholder' => 'Select a Expenses Category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>