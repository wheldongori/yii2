<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage('/video/index');
        $I->see('FreeCodeTube');
        $I->seeLink('Home');
        $I->click('Home');
        

        // $I->see('Restaurant management system');
        $I->seeLink('Login');
    }
}