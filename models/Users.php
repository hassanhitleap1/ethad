<?php

namespace app\models;

use Carbon\Carbon;
use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $date_of_birth
 * @property string|null $auth_key
 * @property string|null $password_hash
 * @property string|null $password_reset_token
 * @property string|null $email
 * @property int|null $status
 * @property int|null $agree
 * @property string|null $phone
 * @property string|null $other_phone
 * @property int|null $area_id
 * @property string|null $address
 * @property string|null $street
 * @property int|null $subscrip_id
 * @property float|null $price_subscrip
 * @property int|null $sender_id
 * @property int|null $status_id
 * @property string|null $start_date
 * @property string|null $note
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Area $area
 * @property Sender $sender
 * @property Subscription $subscrip
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_birth', 'start_date', 'created_at', 'updated_at'], 'safe'],
            [['status', 'agree', 'area_id', 'subscrip_id', 'sender_id', 'status_id'], 'integer'],
            [['price_subscrip'], 'number'],
            [['note'], 'string'],
            [['created_at'], 'required'],
            [['username', 'name_en', 'name_ar', 'password_hash', 'password_reset_token', 'email', 'phone', 'other_phone'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['address', 'street'], 'string', 'max' => 250],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['email'], 'unique'],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['sender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sender::className(), 'targetAttribute' => ['sender_id' => 'id']],
            [['subscrip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subscription::className(), 'targetAttribute' => ['subscrip_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_ar' => Yii::t('app', 'Name Ar'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'agree' => Yii::t('app', 'Agree'),
            'phone' => Yii::t('app', 'Phone'),
            'other_phone' => Yii::t('app', 'Other Phone'),
            'area_id' => Yii::t('app', 'Area ID'),
            'address' => Yii::t('app', 'Address'),
            'street' => Yii::t('app', 'Street'),
            'subscrip_id' => Yii::t('app', 'Subscrip ID'),
            'price_subscrip' => Yii::t('app', 'Price Subscrip'),
            'sender_id' => Yii::t('app', 'Sender ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'start_date' => Yii::t('app', 'Start Date'),
            'note' => Yii::t('app', 'Note'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

      /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $today=Carbon::now("Asia/Amman");
        if (parent::beforeSave($insert)) {
            // Place your custom code here
            if ($this->isNewRecord) {
                $this->created_at = $today;
                $this->updated_at = $today;
            } else {
                $this->updated_at =$today;
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery|AreaQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * Gets query for [[Sender]].
     *
     * @return \yii\db\ActiveQuery|SenderQuery
     */
    public function getSender()
    {
        return $this->hasOne(Sender::className(), ['id' => 'sender_id']);
    }

    /**
     * Gets query for [[Subscrip]].
     *
     * @return \yii\db\ActiveQuery|SubscriptionQuery
     */
    public function getSubscrip()
    {
        return $this->hasOne(Subscription::className(), ['id' => 'subscrip_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
