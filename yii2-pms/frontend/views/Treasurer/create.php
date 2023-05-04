<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Treasurer $model */

$this->title = 'Create Treasurer';
$this->params['breadcrumbs'][] = ['label' => 'Treasurers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treasurer-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
