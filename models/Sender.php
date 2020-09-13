<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sender}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property User[] $users
 */
class Sender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sender}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['sender_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SenderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SenderQuery(get_called_class());
    }
}
