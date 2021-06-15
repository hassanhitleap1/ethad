<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch represents the model behind the search form of `app\models\Users`.
 */
class UsersSearch extends Users
{

    public $name_creater;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'agree','type','by_user'], 'integer'],
            [['username', 'name_en',  'subscrip_id', 'sender_id', 'status_id','area_id','name_ar', 'date_of_birth', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'phone', 'other_phone', 'address', 'street', 'start_date', 'note', 'created_at', 'updated_at'], 'safe'],
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
        $query = Users::find();

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

        $query->joinWith('area');
        $query->joinWith('sender');
        $query->joinWith('subscrip');
        $query->joinWith('status');
        $query->joinWith('crater as crater');
        



        if(\Yii::$app->user->identity->username =="admin"){
            $query->andFilterWhere([
                'user.type'=>$this->type
            ]);
        }else{
            $query->andFilterWhere([
                'user.type'=>2
            ]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user.id' => $this->id,
            'user.date_of_birth' => $this->date_of_birth,
            'user.status' => $this->status,
            'user.agree' => $this->agree,
            'user.price_subscrip' => $this->price_subscrip,
            'user.start_date' => $this->start_date,
            'user.by_user'=> $this->start_date,

//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'user.name_en', $this->name_en])
            ->andFilterWhere(['like', 'user.name_ar', $this->name_ar])
            ->andFilterWhere(['like', 'user.auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'user.password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'user.password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'user.email', $this->email])
            ->andFilterWhere(['like', 'user.phone', $this->phone])
            ->andFilterWhere(['like', 'user.other_phone', $this->other_phone])
            ->andFilterWhere(['like', 'user.address', $this->address])
            ->andFilterWhere(['like', 'user.street', $this->street])
            ->andFilterWhere(['like', 'user.note', $this->note])

            ->andFilterWhere(['like', 'area.name_ar', $this->area])
            ->andFilterWhere(['like', 'subscription.name', $this->subscrip_id])
            ->andFilterWhere(['like', 'sender.name', $this->sender_id])
            ->andFilterWhere(['like', 'status.name', $this->status_id]);

        if(!is_null($this->created_at) && $this->created_at !=''){
            $arr_date=explode(' - ',$this->created_at);
            $query->andFilterWhere(['>=', 'DATE(user.created_at)', $arr_date[0]])
                ->andFilterWhere(['<=', 'DATE(user.created_at)', $arr_date[1]]);
        }

        return $dataProvider;
    }
}
