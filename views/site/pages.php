<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title =  Yii::t('app','Pages');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php foreach($pages as $page):?>
    <div class="panel panel-default">
        <div class="panel-heading"><?=$page['title']?></div>
        <div class="panel-body"><?=$page['text']?></div>
    </div>
<?php  endforeach;?>