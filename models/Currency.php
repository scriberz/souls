<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property CurrencyRate[] $currencyRates
 * @property ProductPrice[] $productPrices
 * @property Purchase[] $purchases
 */
class Currency extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'currency';
    }

    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'name' => 'Наименование',
        ];
    }

    public function getCurrencyRates()
    {
        return $this->hasMany(CurrencyRate::class, ['currency_id' => 'id']);
    }

    public function getProductPrices()
    {
        return $this->hasMany(ProductPrice::class, ['currency_id' => 'id']);
    }

    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['currency_id' => 'id']);
    }
}
