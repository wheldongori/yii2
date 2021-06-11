<?php
/**
 * User: Mark Gori
 * Date: 12/21/2020
 * Time: 01:31 AM
 */

 namespace frontend\components;

 use Yii;
 use yii\base\BootstrapInterface;
 

class Bootstrapit implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Yii::warning(Yii::$app->user->id, 'Bootstrapit');
    }
}