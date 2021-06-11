<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;


class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/video/index');
        $I->see('FreeCodeTube');

        $I->seeLink('Home');
        $I->click('Home');
        $I->wait(2); // wait for page to be opened

        $I->see('Restaurant management system');
    }
}
