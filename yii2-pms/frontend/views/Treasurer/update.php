<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Treasurer $model */

$this->title = 'Update Treasurer: ' . $model->treasurer_id;
$this->params['breadcrumbs'][] = ['label' => 'Treasurers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->treasurer_id, 'url' => ['view', 'treasurer_id' => $model->treasurer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treasurer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
