<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Treasurercategory $model */

$this->title = 'Update Treasurer Category: ' . $model->treasurer_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Treasurercategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->treasurer_category_id, 'url' => ['view', 'treasurer_category_id' => $model->treasurer_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treasurercategory-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
