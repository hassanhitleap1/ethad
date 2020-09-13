<?php

use yii\db\Migration;

/**
 * Class m200913_194915_create_status_tabe
 */
class m200913_194915_create_status_tabe extends Migration
{
  
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            
        ], $tableOptions);

    }
    public function down()
    {
        $this->dropTable('{{%status}}');
    }
}
