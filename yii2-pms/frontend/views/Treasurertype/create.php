<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Treasurertype $model */

$this->title = 'Create Treasurertype';
$this->params['breadcrumbs'][] = ['label' => 'Treasurertypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treasurertype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
