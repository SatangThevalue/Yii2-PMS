<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Expensescategory $model */

$this->title = 'Update Expenses Category: ' . $model->expenses_category_title;
$this->params['breadcrumbs'][] = ['label' => 'Expenses Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->expenses_category_title, 'url' => ['view', 'expenses_category_id' => $model->expenses_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expensescategory-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
