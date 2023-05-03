<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Expensescategory $model */

$this->title = 'Create Expenses Category';
$this->params['breadcrumbs'][] = ['label' => 'Expenses Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expensescategory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
