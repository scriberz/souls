<?php

class m210101_000001_create_currency_table extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'code' => $this->string(3)->notNull(),
            'name' => $this->string(255)->notNull(),
        ]);

        $this->batchInsert('currency', ['code', 'name'], [
            ['RUB', 'Рубли'],
            ['USD', 'Доллары США'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('currency');
    }
}

