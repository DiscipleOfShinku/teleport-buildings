<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%building}}`.
 */
class m200717_152600_create_building_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%building}}', [
            'id' => $this->primaryKey(),
            'street' => $this->string()->notNull(),
            'number' => $this->string()->notNull(),
            'floors' => $this->integer()->notNull(),
            'space' => $this->double()->notNull(),
            'build_date' => $this->date()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%building}}');
    }
}
