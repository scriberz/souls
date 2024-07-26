<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */

$this->title = 'Покупка продукта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="purchase-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'currency_id')->dropDownList([1 => 'RUB', 2 => 'USD']) ?>

        <?= $form->field($model, 'amount')->textInput(['readonly' => true, 'value' => $model->getPrice($model->product_id, $model->currency_id)]) ?>

        <div class="form-group">
            <?= Html::submitButton('Купить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
