<?php

use yii\db\Migration;

/**
 * Class m190530_124629_settings
 */
class m190530_124629_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function tableName(){
        return 'settings';
    }

    public function safeUp()
    {

        $this->createTable($this->tableName(), [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'img' => $this->string(255)->null(),
            'title' => $this->string(255)->null(),
            'lang_id' => $this->integer(11)->notNull(),
        ]);

        $this->createIndex(
            'idx-settings-lang_id',
            'settings',
            'lang_id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-settings-lang_id',
            'settings'
        );

        $this->dropTable($this->tableName());
    }
}
