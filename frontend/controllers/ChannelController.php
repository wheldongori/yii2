<?php
/**
 * User: Mark Gori
 * Date: 12/17/2020
 * Time: 6:55 AM
 */

namespace frontend\controllers;

use common\models\Subscriber;
use common\models\User;
use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
  * class ChannelController
  * 
  * @author Mark Gori <mgori089@gmail.com>
  * @package frontend/controllers
  */
 class ChannelController extends Controller
 {
     public function behaviors():array
     {
         # code...
         return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['subscribe'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
         ];
     }
    public function actionView($username)
    {
        # code...
        $channel = $this->findChannel($username);

        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()
            ->creator($channel->id)
            ->published(Video::STATUS_UNLISTED)
        ]);

        return $this->render('view',['channel' => $channel,'dataProvider' => $dataProvider]);
    }

    /**
     * @param $username
     * @return \common\models\User|null
     * @throws \yii\web\NotFoundHttpException
     * @author Mark Gori <mgori089@gmail.com>
     */
    public function findChannel($username)
    {
        # code...
        $channel = User::findByUsername($username);
        if(!$channel){
            throw new NotFoundHttpException("Channel Does not exist");
        }

        return $channel;
    }

    public function actionSubscribe($username)
    {
        # code...
        $channel = $this->findChannel($username);

        $userId = \Yii::$app->user->id;
        $subscriber = $channel->isSubscribed($userId);

        if (!$subscriber) {
            $subscriber = new Subscriber();
            $subscriber->channel_id = $channel->id;
            $subscriber->user_id = $userId;
            $subscriber->created_at = time();
            $subscriber->save();
        }else{
            $subscriber->delete();
        }

        return $this->renderAjax('_subscriber',['channel' => $channel]);

    }
 } 