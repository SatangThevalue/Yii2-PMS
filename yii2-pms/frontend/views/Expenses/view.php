<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\Expensescategory;
use common\models\Expensestype;

/** @var yii\web\View $this */
/** @var common\models\Expenses $model */

$this->title = $model->expenses_id;
$this->params['breadcrumbs'][] = ['label' => 'Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expenses-view">

    <p>
        <?= Html::a('Update', ['update', 'expenses_id' => $model->expenses_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'expenses_id' => $model->expenses_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'expenses_id',
            /* 'expenses_type', */
            // TODO(SaTangTheValue): FK Expenses type in view
            [
                'attribute' => 'expenses_type',
                'label' => 'ชนิด',
                'filter' => ArrayHelper::map(Expensestype::find()->all(), 'expenses_type_id', 'expenses_type_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->expensesType->expenses_type_title;
                }
            ],
            'expenses_category_date',
            /* 'expenses_category_Fk', */
            // TODO(SaTangTheValue): FK Expenses category in view
            [
                'attribute' => 'expenses_category_Fk',
                'label' => 'ประเภท',
                'filter' => ArrayHelper::map(Expensescategory::find()->all(), 'expenses_category_id', 'expenses_category_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->expensesCategory->expenses_category_title;
                }
            ],
            'expenses_amount',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
