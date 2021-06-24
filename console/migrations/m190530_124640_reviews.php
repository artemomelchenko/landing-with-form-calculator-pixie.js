<?php

use yii\db\Migration;

/**
 * Class m190530_124640_reviews
 */
class m190530_124640_reviews extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function tableName(){
        return 'reviews';
    }

    public function safeUp()
    {

        $this->createTable($this->tableName(), [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'img' => $this->string(255)->null(),
            'date' => $this->timestamp()->notNull(),
            'lang_id' => $this->integer(11)->notNull(),
            'accepted' => $this->boolean()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx-reviews-lang_id',
            'reviews',
            'lang_id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropIndex(
            'idx-reviews-lang_id',
            'reviews'
        );

        $this->dropTable($this->tableName());
    }
}
