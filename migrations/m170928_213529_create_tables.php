<?php

use yii\db\Migration;

class m170928_213529_create_tables extends Migration
{
    public function safeUp()
    {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql') {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }
    $this->createTable('{{%taskuser}}', [
        'id' =>  $this->primaryKey(),
        'family_name' => $this->string(),
        'first_name' => $this->string()->notNull(),
        'burthday' => $this->date()->notNull(),
        'sex' => $this->string()->notNull()
    ], $tableOptions);
    $this->createIndex('id', '{{%taskuser}}', 'id', true);
    
    $this->createTable('{{%taskadress}}', [
        'id' => $this->primaryKey(),
        'userid' => $this->string()->notNull(),
        'address' => $this->string()->notNull(),
        'comment' => $this->string()
    ], $tableOptions);
    $this->createIndex('id', '{{%taskadress}}', 'id', true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%taskuser}}');
        $this->dropTable('{{%taskadress}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170928_213529_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
