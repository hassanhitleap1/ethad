<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200913_195339_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique(),
            'name_en' => $this->string(),
            'name_ar' => $this->string(),
            'date_of_birth'=>$this->dateTime()->defaultValue(null),
            'auth_key' => $this->string(32),
            'password_hash' => $this->string(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->unique(),
            'status' => $this->smallInteger()->defaultValue(10),
            'agree' => $this->integer(),
            'phone' => $this->string(),
            'other_phone' => $this->string(),
            'area_id' => $this->integer(),
            'address' => $this->string(250),
            'street' => $this->string(250),
            'subscrip_id'=> $this->integer(),
            'price_subscrip'=> $this->double()->defaultValue(0.0),
            'sender_id' => $this->integer(),
            'status_id' => $this->integer(),
            'start_date' =>$this->dateTime()->defaultValue(null),
            'note' => $this->text(),
            'created_at' =>$this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->defaultValue(null),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-sender-subscrip_id',
            'user',
            'subscrip_id',
            'subscription',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sender-sender_id',
            'user',
            'sender_id',
            'sender',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-area-area_id',
            'user',
            'area_id',
            'area',
            'id',
            'CASCADE'
        );
    

    }
    public function down()
    {
      
        $this->dropForeignKey(
            'fk-area-area_id',
            'user'
        );
        $this->dropForeignKey(
            'fk-sender-subscrip_id',
            'user'
        );
        $this->dropForeignKey(
            'fk-sender-sender_id',
            'user'
        );

        $this->dropTable('{{%user}}');
    }
}
