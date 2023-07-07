<?php

use yii\db\Migration;

/**
 * Class m230706_225129_create_table_books_info_returned
 */
class m230706_225129_create_table_books_info_returned extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books_info_returned', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'returned_date' => $this->dateTime()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'book_condition' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230706_225129_create_table_books_info_returned cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230706_225129_create_table_books_info_returned cannot be reverted.\n";

        return false;
    }
    */
}
