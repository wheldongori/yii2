<?php

use backend\assets\TagsInputAsset;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\bootstrap4\ActiveForm */
TagsInputAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

          <div class="form-group">
              <label><?=$model->getAttributeLabel('thumbnail');?></label>
            <div class="custom-file">
                    <input type="file" id="thumbnail" class="custom-file-input" name="thumbnail">
                    <label class="custom-file-label" for = "thumbnail"></label>
                </div>
          </div>

            <?= $form->field($model, 'tags',[
                'inputOptions' => ['data-role' => 'tagsinput']
            ])->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-sm-4">
            <div class="embed-responsive embed-responsive-16by9 mb-3">
                <video src="<?=$model->getVideoLink();?>" poster="<?=$model->getThumbnailLink();?>" 
                class="embed-responsive-item" controls></video>
            </div>
            <div class="mb-3">
                <div class="text-muted">
                Video Link
                </div>
                <a href="<?=$model->getVideoLink()?>">Open Video</a>
            </div>
            <div class="mb-3">
                <div class="text-muted"><p>Video name</p></div>
            <?=$model->title;?></div>
            <?=$form->field($model, 'status')->dropdownList($model->getStatusLabels()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success','name' => 'saveVideo']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
