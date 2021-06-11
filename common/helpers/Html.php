<?php
/**
 * User: Mark Gori
 * Date: 12/19/2020
 * Time: 12:06 PM
 */

 namespace common\helpers;

use yii\helpers\Html as HelpersHtml;

/**
  * class Html
  * 
  * @author Mark Gori <mgori089@gmail.com>
  * @package common\helpers
  */
  class Html
  {
      public static function channelLink($user)
      {
          # code...
          return HelpersHtml::a($user->username,
          ['/channel/view','username' => $user->username],['class' => 'text-dark']);
      }
  }