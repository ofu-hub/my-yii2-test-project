<?php

use yii\db\Migration;

/**
 * Class m230705_110914_create_table_book
 */
class m230705_110914_create_table_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'vendor_code' => $this->string(),
            'receipt_date' => $this->dateTime(),
            'author_name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230705_110914_create_table_book cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230705_110914_create_table_book cannot be reverted.\n";

        return false;
    }
    */
}
