<?php

namespace frontend\components;

use common\models\Video;
use common\models\VideoLike;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;

class UserLikeDislike extends Component
{
    public $userId;
    public $videoLikeDislike;
    public $id;
    public $type;

    public function __construct($userId,$videoLikeDislike,$id,$type)
    {
        # code...
        $userId = $userId;
        $videoLikeDislike = $videoLikeDislike;
        $id = $id;
        $type = $type;
    }

    public function getUserId()
    {
        # code...
        $userId = \Yii::$app->user->id;
        return $userId;
    }

    public function getVideoLikeOrDislike($id)
    {
        # code...
        $videoLikeDislike = VideoLike::find()->userIdvideoId($this->getUserId(),$id)->one();
        return $videoLikeDislike;
    }

    public function getLikeType($like)
    {
        # code...
        $type = $like == 1 ? VideoLike::TYPE_LIKE : VideoLike::TYPE_DISLIKE;
        return $type;
    }

    public function getVideo($id)
    {
        # code...
        $id = Video::findOne($id);
        if(!$id){
            throw new NotFoundHttpException("Video not found exception");
        }

        return $id;
    }

    public function instantiate($userId,$id,$videoLikeDislike,$type)
    {
        # code...
        return new UserLikeDislike($userId,$videoLikeDislike,$id,$type);
    }
}
