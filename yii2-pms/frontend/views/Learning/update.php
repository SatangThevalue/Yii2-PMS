<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Learning $model */

$this->title = 'Update Learning: ' . $model->learning_id;
$this->params['breadcrumbs'][] = ['label' => 'Learnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->learning_id, 'url' => ['view', 'learning_id' => $model->learning_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="learning-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
