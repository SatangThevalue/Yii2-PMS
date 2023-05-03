<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Investment $model */

$this->title = 'Create Investment';
$this->params['breadcrumbs'][] = ['label' => 'Investments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
