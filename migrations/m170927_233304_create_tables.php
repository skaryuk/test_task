<?php

use yii\db\Migration;

class m170927_233304_create_tables extends Migration
{
    public function safeup()
    {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql') {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }
    $this->createTable('{{%users}}', [
        'id' =>  $this->primaryKey(),
        'family_name' => $this->string(),
        'first_name' => $this->string()->notNull(),
        'burthday' => $this->date()->notNull(),
        'sex' => $this->string()->notNull()
    ], $tableOptions);
    $this->createIndex('id', '{{%users}}', 'id', true);
    
    $this->createTable('{{%user_address}}', [
        'id' =>  $this->primaryKey(),
        'user_id' => $this->string(),
        'address_id' => $this->string()->notNull()
    ], $tableOptions);
    
    
    $this->createTable('{{%addresses}}', [
        'id' => $this->primaryKey(),
        'address' => $this->string()->notNull(),
        'comment' => $this->string()
    ], $tableOptions);
    $this->createIndex('id', '{{%addresses}}', 'id', true);
//    $this->createTable('{{%post}}', [
//        'id' => Schema::TYPE_PK,
//        'title' => Schema::TYPE_STRING . ' NOT NULL',
//        'content' => Schema::TYPE_TEXT . ' NOT NULL',
//        'category_id' => Schema::TYPE_SMALLINT . ' unsigned NOT NULL',
//        'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
//        'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
//        'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
//    ], $tableOptions);
//    $this->createIndex('status', '{{%post}}', 'status');
//    $this->createTable('{{%comment}}', [
//        'id' => Schema::TYPE_PK,
//        'author' => Schema::TYPE_STRING . ' NOT NULL',
//        'email' => Schema::TYPE_STRING . ' NOT NULL',
//        'url' => Schema::TYPE_STRING . ' NOT NULL',
//        'content' => Schema::TYPE_TEXT . ' NOT NULL',
//        'status' => Schema::TYPE_SMALLINT . ' NOT NULL'
//    ], $tableOptions);
//    $this->createIndex('status', '{{%comment}}', 'status');
//    $this->execute($this->addUserSql());
}
//private function addUserSql()
//{
//    $password = Yii::$app->security->generatePasswordHash('admin');
//    $auth_key = Yii::$app->security->generateRandomString();
//    $token = Yii::$app->security->generateRandomString() . '_' . time();
//    return "INSERT INTO {{%user}} (`username`, `email`, `password`, `auth_key`, `token`) VALUES ('admin', 'admin@myblog.loc', '$password', '$auth_key', '$token')";
//}
    

    public function safedown()
    {
//        echo "m170927_233304_create_tables cannot be reverted.\n";
//
//        return false;
        $this->dropTable('{{%users}}');
        $this->dropTable('{{%user_address}}');
        $this->dropTable('{{%addresses}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170927_233304_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
