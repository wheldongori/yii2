<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\fixtures\VideoFixture;




/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
            'video' => [
                'class' => VideoFixture::class,
                'dataFile' => codecept_data_dir() . 'video_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'erau');
        $I->fillField('Password', 'password_0');
        $I->click('login-button');

        $I->see('Videos','h1');

        // $I->see('Logout (erau)', 'form button[type=submit]');
        $I->seeLink('Create');
        $I->click('Create');
        $I->click('button');
     

        // // $I->attachFile('#videoFile',
        // // 'y2mate.com - Restaurant Management System Open Source Project - PHP_3OlzL-aIdmk_1080p.mp4');
        $I->submitForm('#form',[
            'Select File' => '/home/arcs/Videos/ALL/y2mate.com - Restaurant Management System Open Source Project - PHP_3OlzL-aIdmk_1080p.mp4'
        ],'video');
        
        $I->seeRecord('common\models\Video', [
            'title' => 'y2mate.com - Restaurant Management System Open Source Project - PHP_3OlzL-aIdmk_1080p.mp4',
            'video_name' => 'y2mate.com - Restaurant Management System Open Source Project - PHP_3OlzL-aIdmk_1080p.mp4'
        ]);
     
    }


}
