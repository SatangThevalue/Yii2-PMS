<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Investment $model */

$this->title = 'Create Investment';
$this->params['breadcrumbs'][] = ['label' => 'Investments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
