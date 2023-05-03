<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Working $model */

$this->title = 'Create Working';
$this->params['breadcrumbs'][] = ['label' => 'Working', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
