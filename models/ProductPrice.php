<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_price".
 *
 * @property int $id
 * @property int $product_id
 * @property int $currency_id
 * @property float $price
 *
 * @property Product $product
 * @property Currency $currency
 */
class ProductPrice extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'product_price';
    }

    public function rules()
    {
        return [
            [['product_id', 'currency_id', 'price'], 'required'],
            [['product_id', 'currency_id'], 'integer'],
            [['price'], 'number'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Продукт',
            'currency_id' => 'Валюта',
            'price' => 'Цена',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }
}
