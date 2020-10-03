<?php

use app\models\Users;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
        <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
                        'data' =>  ArrayHelper::map(Users::find()->all(), 'id', 'name_ar'),
                        'language' => 'ar',
                        'options' => ['placeholder' =>Yii::t('app',"Plz_Select_Name_Of_Jobs")],
                       
                    ]); ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'voucher_number')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'amount_paid')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">

        <?php /*
        $form->field($model, 'registration_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'autoclose'=>true
                    ]
            ]);
            
            
            */?>
        </div>
        <div class="col-md-4">
      
        <?= $form->field($model, 'payment_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'autoclose'=>true
                    ]
            ]);?>
        </div>
        
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
