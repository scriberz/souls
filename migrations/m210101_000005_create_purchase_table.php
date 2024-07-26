<?php

class m210101_000005_create_purchase_table extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable('purchase', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'amount' => $this->decimal(10, 2)->notNull(),
            'purchase_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey('fk-purchase-product_id', 'purchase', 'product_id', 'product', 'id', 'CASCADE');
        $this->addForeignKey('fk-purchase-currency_id', 'purchase', 'currency_id', 'currency', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-purchase-product_id', 'purchase');
        $this->dropForeignKey('fk-purchase-currency_id', 'purchase');
        $this->dropTable('purchase');
    }
}
