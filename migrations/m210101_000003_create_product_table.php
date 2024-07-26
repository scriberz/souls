<?php

class m210101_000003_create_product_table extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
        ]);

        $this->batchInsert('product', ['name', 'description'], [
            ['билет на тренинг', 'Описание билета на тренинг'],
            ['индивидуальная консультация', 'Описание индивидуальной консультации'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('product');
    }
}
