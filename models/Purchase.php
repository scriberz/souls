<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $phone
 * @property int $currency_id
 * @property float $amount
 * @property string $purchase_date
 *
 * @property Product $product
 * @property Currency $currency
 */
class Purchase extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'purchase';
    }

    public function rules()
    {
        return [
            [['product_id', 'name', 'phone', 'currency_id', 'amount'], 'required'],
            [['product_id', 'currency_id'], 'integer'],
            [['amount'], 'number'],
            [['purchase_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Продукт',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'currency_id' => 'Валюта',
            'amount' => 'Сумма',
            'purchase_date' => 'Дата покупки',
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
