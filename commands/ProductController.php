<?php

namespace app\commands;

use yii\console\Controller;
use app\models\ProductPrice;

class ProductController extends Controller
{
    public function actionAddPrice($product_id, $currency_id, $price)
    {
        $model = new ProductPrice();
        $model->product_id = $product_id;
        $model->currency_id = $currency_id;
        $model->price = $price;
        if ($model->save()) {
            echo "Стоимость продукта добавлена.\n";
        } else {
            echo "Ошибка: " . print_r($model->errors, true) . "\n";
        }
    }
}
