<?php

use yii\db\Migration;

/**
 * Class m190530_124705_applications
 */
class m190530_124705_applications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function tableName(){
        return 'applications';
    }

    public function safeUp()
    {

        $this->createTable($this->tableName(), [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->null(),
            'img' => $this->string(255)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable($this->tableName());
    }
}
