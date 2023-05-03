<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Working $model */

$this->title = 'Update Working: ' . $model->working_id;
$this->params['breadcrumbs'][] = ['label' => 'Working', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->working_id, 'url' => ['view', 'working_id' => $model->working_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="working-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
