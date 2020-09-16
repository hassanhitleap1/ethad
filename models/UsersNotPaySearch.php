<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsersNotPay;

/**
 * UsersSearch represents the model behind the search form of `app\models\Users`.
 */
class UsersNotPaySearch extends UsersNotPay
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'agree', 'area_id', 'subscrip_id', 'sender_id', 'status_id'], 'integer'],
            [['username', 'name_en', 'name_ar', 'date_of_birth', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'phone', 'other_phone', 'address', 'street', 'start_date', 'note', 'created_at', 'updated_at'], 'safe'],
            [['price_subscrip'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UsersNotPay::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_of_birth' => $this->date_of_birth,
            'status' => $this->status,
            'agree' => $this->agree,
            'area_id' => $this->area_id,
            'subscrip_id' => $this->subscrip_id,
            'price_subscrip' => $this->price_subscrip,
            'sender_id' => $this->sender_id,
            'status_id' => $this->status_id,
            'start_date' => $this->start_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ar', $this->name_ar])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'other_phone', $this->other_phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
