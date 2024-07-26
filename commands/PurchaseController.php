<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Purchase;

class PurchaseController extends Controller
{
    public function actionAdd($product_id, $name, $phone, $currency_id, $amount)
    {
        $model = new Purchase();
        $model->product_id = $product_id;
        $model->name = $name;
        $model->phone = $phone;
        $model->currency_id = $currency_id;
        $model->amount = $amount;
        if ($model->save()) {
            echo "Покупка добавлена.\n";
        } else {
            echo "Ошибка: " . print_r($model->errors, true) . "\n";
        }
    }
}
