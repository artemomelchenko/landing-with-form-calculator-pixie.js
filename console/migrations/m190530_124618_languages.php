<?php

use yii\db\Migration;

/**
 * Class m190530_124618_languages
 */
class m190530_124618_languages extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function tableName(){
        return 'languages';
    }

    public function safeUp()
    {

        $this->createTable($this->tableName(), [
            'id' => $this->primaryKey()->notNull(),
            'lang' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
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
