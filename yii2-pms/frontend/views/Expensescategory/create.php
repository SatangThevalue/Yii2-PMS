<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Expensescategory $model */

$this->title = 'Create Expensescategory';
$this->params['breadcrumbs'][] = ['label' => 'Expensescategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expensescategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
