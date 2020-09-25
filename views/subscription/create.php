<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subscription */

$this->title = Yii::t('app', 'Create_Subscription');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subscriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
