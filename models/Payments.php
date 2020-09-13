<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%payments}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $voucher_number
 * @property float $amount_paid
 * @property string|null $registration_date
 * @property string|null $payment_date
 * @property string $created_at
 * @property string|null $updated_at
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%payments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'amount_paid', 'created_at'], 'required'],
            [['user_id'], 'integer'],
            [['amount_paid'], 'number'],
            [['registration_date', 'payment_date', 'created_at', 'updated_at'], 'safe'],
            [['voucher_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'voucher_number' => Yii::t('app', 'Voucher Number'),
            'amount_paid' => Yii::t('app', 'Amount Paid'),
            'registration_date' => Yii::t('app', 'Registration Date'),
            'payment_date' => Yii::t('app', 'Payment Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PaymentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentsQuery(get_called_class());
    }
}
