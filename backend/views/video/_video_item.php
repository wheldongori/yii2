<?php
/**@var $model \common\models\Video */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div class="media">
   <a href="<?=Url::to(['/video/update','id' => $model->video_id]);?>">
   <div class="embed-responsive embed-responsive-16by9 mr-2" style="width:120px">
                <video src="<?=$model->getVideoLink();?>" poster="<?=$model->getThumbnailLink();?>" 
                class="embed-responsive-item"></video>
            </div>
   </a>
  <div class="media-body">
    <h6 class="mt-0"><?=$model->title?></h6>
        <?= StringHelper::truncateWords($model->description,10)?>
  </div>
</div>