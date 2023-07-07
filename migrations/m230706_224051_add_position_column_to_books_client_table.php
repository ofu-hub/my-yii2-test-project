<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%books_client}}`.
 */
class m230706_224051_add_position_column_to_books_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%books_client}}', 'name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%books_client}}', 'name');
    }
}
