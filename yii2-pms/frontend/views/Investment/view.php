<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// TODO(SaTangTheValue): Improt ArrayHelper
use yii\helpers\ArrayHelper;
// TODO(SaTangTheValue): models from common
use common\models\InvestmentType;

/** @var yii\web\View $this */
/** @var common\models\Investment $model */

$this->title = $model->investment_id;
$this->params['breadcrumbs'][] = ['label' => 'Investments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="investment-view">
    <p>
        <?= Html::a('Update', ['update', 'investment_id' => $model->investment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'investment_id' => $model->investment_id], [
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
            'investment_id',
            'investment_date',
            //'investment_type_fk',
            [
                'attribute' => 'investment_type_fk',
                'label' => 'ประเภท',
                'filter' => ArrayHelper::map(InvestmentType::find()->all(), 'investment_type_id', 'investment_type_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->investmentType->investment_type_title;
                }
            ],
            'investment_amount',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
