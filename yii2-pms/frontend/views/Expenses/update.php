<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Expenses $model */

$this->title = 'Update Expenses: ' . $model->expenses_id;
$this->params['breadcrumbs'][] = ['label' => 'Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->expenses_id, 'url' => ['view', 'expenses_id' => $model->expenses_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expenses-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
