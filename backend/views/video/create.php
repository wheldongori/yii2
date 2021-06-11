<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create" style="width:1200px">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="upload-icon">
            <i class="fas fa-upload"></i>
        </div>
        <br/>
        <p class="m-0">Drag and drop a file you want to upload</p>
        <p class="text-muted">Your video will be private until you publish it</p>
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data','id'=>'form']
        ])?>
        <button  name="button" class="btn btn-primary btn-file">
            Select File
            <input type="file" id = "videoFile" name="video" />
            <!-- <?= $form->field($model,'video')->fileInput() ?> -->
            
        </button>
        <?php ActiveForm::end() ?>
    </div>

</div>
