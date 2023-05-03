<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Learning $model */

$this->title = 'Create Learning';
$this->params['breadcrumbs'][] = ['label' => 'Learnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learning-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
