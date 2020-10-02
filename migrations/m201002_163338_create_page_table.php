<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 */
class m201002_163338_create_page_table extends Migration
{
    

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'key'=>$this->string(500),
            "title"=>$this->string(500),
            'text'=>$this->text(),

        ], $tableOptions);

    }
        

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%page}}');
    }
}
