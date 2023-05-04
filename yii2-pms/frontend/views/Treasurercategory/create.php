<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Treasurercategory $model */

$this->title = 'Create Treasurer Category';
$this->params['breadcrumbs'][] = ['label' => 'Treasurercategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treasurercategory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
