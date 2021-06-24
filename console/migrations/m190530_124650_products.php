<?php

use yii\db\Migration;

/**
 * Class m190530_124650_products
 */
class m190530_124650_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function tableName(){
        return 'products';
    }

    public function safeUp()
    {

        $this->createTable($this->tableName(), [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->notNull(),
            'model' => $this->string(255)->null(),
            'weight' => $this->string(255)->null(),
            'price' => $this->string(255)->null(),
            'text' => $this->text()->null(),
            'img' => $this->string(255)->null(),
            'application_id' => $this->string()->notNull(),
            'lang_id' => $this->integer(11)->notNull(),
        ]);

        $this->createIndex(
            'idx-products-lang_id',
            'products',
            'lang_id'
        );

        $this->createIndex(
            'idx-products-application_id',
            'products',
            'application_id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-products-lang_id',
            'products'
        );

        $this->dropIndex(
            'idx-products-application_id',
            'products'
        );

        $this->dropTable($this->tableName());
    }
}
