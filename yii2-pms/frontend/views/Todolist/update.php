<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Todolist $model */

$this->title = 'Update Todolist: ' . $model->todolist_id;
$this->params['breadcrumbs'][] = ['label' => 'Todolists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->todolist_id, 'url' => ['view', 'todolist_id' => $model->todolist_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="todolist-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
