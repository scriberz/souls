<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property ProductPrice[] $productPrices
 * @property Purchase[] $purchases
 */
class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
        ];
    }

    public function getProductPrices()
    {
        return $this->hasMany(ProductPrice::class, ['product_id' => 'id']);
    }

    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['product_id' => 'id']);
    }

    public function getPrice($currencyId)
    {
        $price = ProductPrice::findOne(['product_id' => $this->id, 'currency_id' => $currencyId]);
        return $price ? $price->price : null;
    }
}
