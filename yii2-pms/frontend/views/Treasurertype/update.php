<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Treasurertype $model */

$this->title = 'Update Treasurertype: ' . $model->treasurer_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Treasurertypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->treasurer_type_id, 'url' => ['view', 'treasurer_type_id' => $model->treasurer_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treasurertype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
