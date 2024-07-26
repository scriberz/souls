<?php

class m210101_000004_create_product_price_table extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable('product_price', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
        ]);

        $this->addForeignKey('fk-product_price-product_id', 'product_price', 'product_id', 'product', 'id', 'CASCADE');
        $this->addForeignKey('fk-product_price-currency_id', 'product_price', 'currency_id', 'currency', 'id', 'CASCADE');

        $this->batchInsert('product_price', ['product_id', 'currency_id', 'price'], [
            [1, 1, 10000.00],
            [1, 2, 10000.00 / 75],
            [2, 1, 5000.00],
            [2, 2, 5000.00 / 75],
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-product_price-product_id', 'product_price');
        $this->dropForeignKey('fk-product_price-currency_id', 'product_price');
        $this->dropTable('product_price');
    }
}
