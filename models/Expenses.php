<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%expenses}}".
 *
 * @property int $id
 * @property string|null $title
 * @property float $value
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%expenses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'number'],
            [['title'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ExpensesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExpensesQuery(get_called_class());
    }
}
