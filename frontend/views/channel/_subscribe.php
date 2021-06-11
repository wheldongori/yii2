<?php
/**
 * User: Mark Gori
 * Date: 12/18/2020
 * Time: 12:11 AM
 */

use yii\helpers\Url;

/** @var $channel \common\models\User */

$subscribe = 'Subscribe';
$unsubscribe = 'Unsubscribe';
?>
 <a href="<?=Url::to(['channel/subscribe','username' => $channel->username])?>"  
    class="btn <?= $channel->isSubscribed(Yii::$app->user->id) ? 'btn-secondary':'btn-danger'?>" 
    data-method="post" data-pjax="1" role="button">
       <?php if($channel->isSubscribed(Yii::$app->user->id)){
           echo $unsubscribe;
       }else{
           echo $subscribe;
       }
        ?> <i class="far fa-bell"></i>
    </a> <?= $channel->getSubscribers()->count();?>