<?php
/**
 * User: Mark Gori
 * Date: 14/12/2020
 * Time: 10:20 AM
 */

use common\helpers\Html as HelpersHtml;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var $model \common\models\Video */
?>

<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
                <video src="<?=$model->getVideoLink();?>" poster="<?=$model->getThumbnailLink();?>" 
                class="embed-responsive-item" controls></video>
            </div>
    <h6 class="mt-2"><?=$model->title?></h6>
    <div class="d-flex justify-content-between align-items-center">
<div><?php if($model->getViews()->count() == 1){ echo 1 ?> view • <?php } else{
    echo $model->getViews()->count();
} ?> views • <?=Yii::$app->formatter->asDate($model->created_at)?></div>
        <div>
            <?php Pjax::begin()?>
                <?= $this->render('_buttons',['model' => $model]);?>
            <?php Pjax::end()?>
        </div>
      </div>
      <div>
          <p><?=HelpersHtml::channelLink($model->createdBy);?></p>
          <?=Html::encode($model->description);?>
      </div>
    </div>
    <div class="col-sm-4">

    </div>
</div>
