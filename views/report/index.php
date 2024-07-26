<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Product;
use app\models\Currency;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчет по продажам';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="report-filter">
        <?php $form = ActiveForm::begin(['method' => 'get']); ?>

        <?= $form->field($searchModel, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'), ['prompt' => 'Выберите продукт']) ?>

        <?= $form->field($searchModel, 'currency_id')->dropDownList(ArrayHelper::map(Currency::find()->all(), 'id', 'name'), ['prompt' => 'Выберите валюту']) ?>

        <?= $form->field($searchModel, 'date_filter')->dropDownList(['today' => 'Сегодня', 'week' => 'За неделю'], ['prompt' => 'Выберите период']) ?>

        <div class="form-group">
            <?= Html::submitButton('Фильтровать', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product.name',
            'name',
            'phone',
            'currency.name',
            'amount',
            'purchase_date',
        ],
    ]); ?>
</div>
