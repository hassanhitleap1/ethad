<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments}}`.
 */
class m200913_195409_create_payments_table extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%payments}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'voucher_number'=>$this->string(),
            'amount_paid'=>$this->double()->notNull(),
            'registration_date' =>$this->dateTime()->defaultValue(null),
            'payment_date' =>$this->dateTime()->defaultValue(null),
            'created_at' =>$this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->defaultValue(null),
            
        ], $tableOptions);

        $this->addForeignKey(
            'fk-payments-user_id',
            'payments',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }
    public function down()
    {
        $this->dropForeignKey(
            'fk-payments-user_id',
            'user'
        );

        $this->dropTable('{{%payments}}');
    }

 
}
