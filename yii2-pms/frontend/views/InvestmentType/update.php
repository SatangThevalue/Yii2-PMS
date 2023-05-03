<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\InvestmentType $model */

$this->title = 'Update Investment Type: ' . $model->investment_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Investment Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->investment_type_id, 'url' => ['view', 'investment_type_id' => $model->investment_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="investment-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
