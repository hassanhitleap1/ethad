<?php

use yii\db\Migration;

/**
 * Class m200913_194754_create_subscription_tabe
 */
class m200913_194754_create_subscription_tabe extends Migration
{
  
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%subscription}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->double()->notNull(),

        ], $tableOptions);

    }
    public function down()
    {
        $this->dropTable('{{%subscription}}');
    }
}
