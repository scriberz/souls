<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\Product;

class ProductController extends ActiveController
{
    public $modelClass = Product::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update']);
        return $actions;
    }
}
