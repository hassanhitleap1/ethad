<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sender]].
 *
 * @see Sender
 */
class SenderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Sender[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Sender|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
