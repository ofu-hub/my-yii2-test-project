<?php

use yii\db\Migration;

/**
 * Class m230706_121035_create_client_table_and_add_fk
 */
class m230706_121035_create_client_table_and_add_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clients', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull(),
            'passport_id' => $this->string()->notNull(),
            'series' => $this->string()->notNull(),
        ]);

        $this->createTable('books_client', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'issue_date' => $this->dateTime()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
            'period' => $this->integer()->notNull(),
        ]);

        // creates index for column `client_id`
        $this->createIndex(
            'idx-books_client-client_id',
            'books_client',
            'client_id'
        );

        // add foreign key for table `clients`
        $this->addForeignKey(
            'fk-books_client-client_id',
            'books_client',
            'client_id',
            'clients',
            'id',
            'CASCADE'
        );

        // creates index for column `employee_id`
        $this->createIndex(
            'idx-books_client-employee_id',
            'books_client',
            'employee_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-books_client-employee_id',
            'books_client',
            'employee_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            'idx-books_client-book_id',
            'books_client',
            'book_id'
        );

        // add foreign key for table `books`
        $this->addForeignKey(
            'fk-books_client-book_id',
            'books_client',
            'book_id',
            'books',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-books_client-client_id',
            'books_client'
        );


        $this->dropIndex(
            'idx-books_client-client_id',
            'books_client'
        );

        $this->dropForeignKey(
            'fk-books_client-employee_id',
            'books_client'
        );

        $this->dropIndex(
            'idx-books_client-employee_id',
            'books_client'
        );

        $this->dropForeignKey(
            'fk-books_client-book_id',
            'books_client'
        );

        $this->dropIndex(
            'idx-books_client-book_id',
            'books_client'
        );

        $this->dropTable('books_client');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230706_121035_create_client_table_and_add_fk cannot be reverted.\n";

        return false;
    }
    */
}
