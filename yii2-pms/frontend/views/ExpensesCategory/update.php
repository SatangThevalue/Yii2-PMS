<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ExpensesCategory $model */

$this->title = 'Update Expenses Category: ' . $model->expenses_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Expenses Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->expenses_category_id, 'url' => ['view', 'expenses_category_id' => $model->expenses_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expenses-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
