<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],        
    ]);

    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app','Home'), 'url' => ['/site/index']];
        $menuItems[] = ['label' => Yii::t('app','About'), 'url' => ['/site/about']];
        $menuItems[] = ['label' => Yii::t('app','Pages'), 'url' => ['/site/pages']];
        $menuItems[] =['label' => Yii::t('app','Login'), 'url' => ['/site/login']];
        
      
    }else{
         
        $menuItems[] = ['label' => Yii::t('app','Home'), 'url' => ['/site/index']];
        $menuItems[] =['label' => Yii::t('app','Users'), 'url' => ['/users/index']];
        $menuItems[] = ['label' => Yii::t('app','Area'), 'url' => ['/area/index']];
        $menuItems[] = ['label' => Yii::t('app','Sender'), 'url' => ['/sender/index']];
        $menuItems[] = ['label' => Yii::t('app','Status'), 'url' => ['/status/index']];
        $menuItems[] = ['label' => Yii::t('app','Payments'), 'url' => ['/payments/index']];
        $menuItems[] = ['label' => Yii::t('app','User_Not_Pay'), 'url' => ['/users-not-pay/index']];
        $menuItems[] =['label' => Yii::t('app','Subscription'), 'url' => ['/subscription/index']];
        $menuItems[] = ['label' => Yii::t('app','Expenses'), 'url' => ['/expenses/index']];
        $menuItems[] = ['label' => Yii::t('app','Pages'), 'url' => ['/page/index']];
        $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            '( ' . Yii::t('app', 'Logout') . ' ' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; اتحاد العربي <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
