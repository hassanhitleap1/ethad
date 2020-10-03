<?php

use Carbon\Carbon;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Payments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create_Payment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
             'user.name_ar',

            // [
            //     'attribute' => 'user_id',
            //     'label'=> Yii::t('app', 'Name'),
            //     'value'=> function($searchModel){
            //         return $searchModel->user['name_ar'];
            //     }
            // ],
            'voucher_number',
            'amount_paid',
            // 'registration_date',
            [
                'attribute' => 'payment_date',
                'label'=> Yii::t('app', 'Payment_Date'),
                'value'=> function($searchModel){
                    return Carbon::parse($searchModel->payment_date)->toDateString();
                }
            ],
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
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
