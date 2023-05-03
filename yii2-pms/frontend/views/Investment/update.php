<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Investment $model */

$this->title = 'Update Investment: ' . $model->investment_id;
$this->params['breadcrumbs'][] = ['label' => 'Investments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->investment_id, 'url' => ['view', 'investment_id' => $model->investment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="investment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
