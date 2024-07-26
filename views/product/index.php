<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products app\models\Product[] */

$this->title = 'Список продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена (RUB)</th>
                <th>Цена (USD)</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= Html::encode($product->name) ?></td>
                    <td><?= Html::encode($product->description) ?></td>
                    <td><?= Html::encode($product->getPrice(1)) ?></td>
                    <td><?= Html::encode($product->getPrice(2)) ?></td>
                    <td><?= Html::a('Купить', ['purchase/create', 'product_id' => $product->id], ['class' => 'btn btn-success']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
