<?php
/**
 * User: Mark gori
 * Date: 14/12/2020
 * Time: 01:41 AM
 */

use yii\helpers\Url;
use common\helpers\Html as HelpersHtml;

/** @var $model \common\models\Video */
?>

<div class="card m-3" style="width: 14rem">
       <a href="<?=Url::to(['/video/view', 'id' => $model->video_id]);?>">
       <div class="embed-responsive embed-responsive-16by9">
                <video src="<?=$model->getVideoLink();?>" poster="<?=$model->getThumbnailLink();?>" 
                class="embed-responsive-item"></video>
            </div>
       </a>
    <div class="card-body p-1">
    <div>
        <h6 class="card-title m-0"><?=$model->title?></h6>
        </div>
        <div>
       <strong> <p class="text-muted card-text m-0"><?=HelpersHtml::channelLink($model->createdBy);?></p></strong>
       </div>
        <p class="text-muted card-text m-0"><?php if($model->getViews()->count() == 1){
            echo 1?> view •<?php } else{ echo $model->getViews()->count();?> views •<?php }?>
             <?=Yii::$app->formatter->asRelativeTime($model->created_at)?></p>
    </div>
</div>