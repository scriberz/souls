<?php

class m210101_000002_create_currency_rate_table extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable('currency_rate', [
            'id' => $this->primaryKey(),
            'currency_id' => $this->integer()->notNull(),
            'rate' => $this->decimal(10, 4)->notNull(),
            'date' => $this->date()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-currency_rate-currency_id',
            'currency_rate',
            'currency_id',
            'currency',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-currency_rate-currency_id', 'currency_rate');
        $this->dropTable('currency_rate');
    }
}
