<?php

use Carbon\Carbon;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Users;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create_User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name_en',
            'name_ar',
            'phone',
            'date_of_birth',
            [
                'attribute'=>'area_id',
                'value'=>function($searchModel){
                    try{
                        return $searchModel['area']['name_en'];
                    }catch (Exception $exception){
                        return "";
                    }

                }
            ],
            [
                'attribute'=>'type',
                'value'=>function($searchModel){
                    return $searchModel['type'] == 1 ? "مدير":"طالب" ;

                },
                'filter'    => [ "1"=>"مدير", "2"=>"طالب" ],
               // 'filter'=>[2=>"طالب",2=>"مدير" , 2=>"طالب"]
            ],
            'address',
            'street',
            'subscrip_id',
            'price_subscrip',
            'status_id',
            'sender_id',
            'note:ntext',
            'created_at',
            [
                'attribute'=>'by_user',
                'value'=>function($searchModel){
                
                    try{
                        return $searchModel['crater']['name_ar'];
                    }catch (Exception $exception){
                        return "";
                    }

                },
                'filter'    =>ArrayHelper::map(Users::find()->where(['type'=>1])->all(), 'id', 'name_ar'),
            ],
//            [
//                'attribute' => 'created_at',
//                'label'=> Yii::t('app', 'Created_At'),
//                'value'=> function($searchModel){
//                    return Carbon::parse($searchModel->created_at)->toDateString();
//                }
//            ],
            [
                'attribute' => 'created_at',
                'label'=> Yii::t('app', 'Created_At'),
                'value'=> function($searchModel){
                    $now = Carbon::now("Asia/Amman");
                     $date = Carbon::parse($searchModel->created_at);
                    $mess="";
                    $def=$date->diffInDays($now);
                    return "registered befor ". $def ;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} '
            ]
  
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
