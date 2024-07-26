<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency_rate".
 *
 * @property int $id
 * @property int $currency_id
 * @property float $rate
 * @property string $date
 *
 * @property Currency $currency
 */
class CurrencyRate extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'currency_rate';
    }

    public function rules()
    {
        return [
            [['currency_id', 'rate', 'date'], 'required'],
            [['currency_id'], 'integer'],
            [['rate'], 'number'],
            [['date'], 'safe'],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_id' => 'Валюта',
            'rate' => 'Курс',
            'date' => 'Дата',
        ];
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }
}
