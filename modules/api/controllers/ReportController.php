<?php

namespace app\modules\api\controllers;

use yii\rest\Controller;
use app\models\PurchaseSearch;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new PurchaseSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $dataProvider;
    }
}
