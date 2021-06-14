<?php

use app\models\Area;
use app\models\Sender;
use app\models\Status;
use app\models\Subscription;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="continer">
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
             <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'name_ar')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'autoclose'=>true
                    ]
            ]);?>
        </div>
    </div>
    <div class="row">
      
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
                 <?= $form->field($model, 'other_phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        

        <div class="col-md-4">
            <?= $form->field($model, 'status_id')->widget(Select2::classname(), [
                        'data' =>  ArrayHelper::map(Status::find()->all(), 'id', 'name'),
                        'language' => 'ar',
                        'options' => ['placeholder' =>Yii::t('app',"Plz_Select_Name_Of_Jobs")],
                       
                    ]); ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'autoclose'=>true
                    ]
            ]);?>
        </div>
        <div class="col-md-4"> 
            <?= $form->field($model, 'sender_id')->widget(Select2::classname(), [
                        'data' =>  ArrayHelper::map(Sender::find()->all(), 'id', 'name'),
                        'language' => 'ar',
                        'options' => ['placeholder' =>Yii::t('app',"Plz_Select_Name_Of_Jobs")],
                       
                    ]); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'area_id')->widget(Select2::classname(), [
                        'data' =>  ArrayHelper::map(Area::find()->all(), 'id', 'name_ar'),
                        'language' => 'ar',
                        'options' => ['placeholder' =>Yii::t('app',"Please_Select")],
                       
                    ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'subscrip_id')->widget(Select2::classname(), [
                        'data' =>  ArrayHelper::map(Subscription::find()->all(), 'id', 'name'),
                        'language' => 'ar',
                        'options' => ['placeholder' =>Yii::t('app',"Plz_Select_Name_Of_Jobs")],
                       
                    ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'price_subscrip')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>   
        </div>
        <?php if(Yii::$app->user->identity->username =="admin"):?>
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type')->dropDownList([  "2"=>"طالب","1"=>"مدير" ]) ?>
        </div>
        <?php
        endif;;
        ?>

       
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
