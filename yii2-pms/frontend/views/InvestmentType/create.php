<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\InvestmentType $model */

$this->title = 'Create Investment Type';
$this->params['breadcrumbs'][] = ['label' => 'Investment Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
