<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ExpensesCategory $model */

$this->title = 'Create Expenses Category';
$this->params['breadcrumbs'][] = ['label' => 'Expenses Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenses-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
