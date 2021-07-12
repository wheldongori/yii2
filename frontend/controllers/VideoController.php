<?php

namespace frontend\controllers;

use Yii;
use common\models\{Video,VideoLike,VideoView};
use yii\data\ActiveDataProvider;
use yii\filters\{AccessControl,VerbFilter};
use yii\web\{Controller,NotFoundHttpException};

/**
 * Video controller
 */
class VideoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors():array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['like','dislike'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
                    ],
            'verb' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'like' => ['POST'],
                    'dislike' => ['POST'],
                ]
            ]
        ];
    }

    /**
     * Display all videos.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        # code...
        $cache  = Yii::$app->cache;
        $data = $cache->get("videos");
        if ($this->checkVideos()) {
            $dataProvider = new ActiveDataProvider([
                    'query' => $this->getVideos()
                ]);
            return $this->render(
                'index',
                [
                    'dataProvider' => $dataProvider
                ]
            );
            $cache->set("videos", $dataProvider, 3600);
        } else {
            return $this->render(
                'index',
                [
            'dataProvider' => $data
        ]
            );
        }
    }

    /**
     * Display a specific video.
     *
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        # code...
        //set a layout that has no sidebar.
        $this->layout = 'auth';

        //get requested video
        $video = $this->findVideo($id);
        // $videoLike = new VideoLike;

        $this->saveView($id);

        return $this->render('view', [
        'model' => $video,
        // 'like'  => $videoLike
        ]);
    }

    /**
     * Fetch Videos from DB.
     *
     * @return $videos
     */
    protected function getVideos()
    {
        #code...
        $videos =  Video::find()->published(Video::STATUS_UNLISTED)->latest();

        return $videos;
    }

    /**
     * Cross check cache with videos from DB.
     *
     * @return mixed
     */
    protected function checkVideos()
    {
        return Yii::$app->cache->get("videos") === false || Yii::$app->cache->get("videos") != $this->getVideos();
    }

    /**
     * Add user like to DB.
     *
     * @param string $id
     * @return mixed
     */
    public function actionLike($id)
    {
        # code...
        $video = $this->findVideo($id);
        
        $this->handleLikeOrDislike($id, VideoLike::TYPE_LIKE);

        return $this->renderAjax('_buttons', [
            'model' => $video
        ]);
    }

    /**
     * Add user dislike to DB
     *
     * @param string $id
     * @return mixed
     */
    public function actionDislike($id)
    {
        # code...
        $video = $this->findVideo($id);
        
        $this->handleLikeOrDislike($id, VideoLike::TYPE_DISLIKE);
        
        return $this->renderAjax('_buttons', [
            'model' => $video
        ]);
    }

    /**
     * Save user view to DB
     * 
     * @param string $id
     */
    public function saveView($id)
    {
        # code...
        $videoView = new VideoView();
        $videoView->video_id = $id;
        $videoView->user_id = \Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();
    }

    /**
     * Find Like or dislike for a particular user in a video
     * 
     * @param string $id
     * @return $likeDislike
     */
    public function checkLikeOrDislike($id)
    {
        # code...
        $userId = \Yii::$app->user->id;
        $likeDislike = VideoLike::find()->userIdvideoId($userId, $id)->one();

        return $likeDislike;
    }
    
    /**
     * Process user like or dislike
     * 
     * @param int $id
     * @param string $likeOrDislike
     */
    protected function handleLikeOrDislike($id, $likeOrDislike)
    {
        #code...
        $videoLikeDislike = $this->checkLikeOrDislike($id);

        if (!$videoLikeDislike) {
            $this->saveLikeDislike($id, $likeOrDislike);
        } elseif ($videoLikeDislike->type == $likeOrDislike) {
            $videoLikeDislike->delete();
        } else {
            $videoLikeDislike->delete();
            $this->saveLikeDislike($id, $likeOrDislike);
        }
    }

    /**
     * Find a specific video
     * 
     * @param string $id
     * @return $video
     */
    protected function findVideo($id)
    {
        # code...
        $video = Video::findOne($id);

        if (!$video) {
            throw new NotFoundHttpException("Video not found exception");
        }

        return $video;
    }

    /**
     * Save user like or dislike
     * 
     * @param string $videoId,$type
     */
    protected function saveLikeDislike($videoId, $type)
    {
        $userId = \Yii::$app->user->id;

        $videoLikeDislike = new VideoLike();
        $videoLikeDislike->video_id = $videoId;
        $videoLikeDislike->user_id = $userId;
        $videoLikeDislike->type = $type;
        $videoLikeDislike->created_at = time();
        $videoLikeDislike->save();
    }
}
