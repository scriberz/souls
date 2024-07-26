<?php

namespace app\commands;

use yii\console\Controller;
use app\models\CurrencyRate;

class CurrencyController extends Controller
{
    public function actionAddRate($currency_id, $rate)
    {
        $model = new CurrencyRate();
        $model->currency_id = $currency_id;
        $model->rate = $rate;
        $model->date = date('Y-m-d');
        if ($model->save()) {
            echo "Курс валюты добавлен.\n";
        } else {
            echo "Ошибка: " . print_r($model->errors, true) . "\n";
        }
    }
}
