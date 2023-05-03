<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Todolist $model */

$this->title = 'Create Todolist';
$this->params['breadcrumbs'][] = ['label' => 'Todolists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
