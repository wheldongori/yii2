<?php
/**
 * User: Mark Gori
 * Date: 14/12/2020
 * Time: 01:37 AM
 */

use yii\widgets\ListView;

/** @var $dataProvider \yii\data\ActiveProvider */
?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_video_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
])?>
