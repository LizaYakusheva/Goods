<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ThirdCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function receiptProduct(AcceptanceTester $I)
    {
        //добавление товара
        $I->amOnPage("/");
        $I->click('#create');
        $I->fillField('#name','test');
        $I->fillField('#price','1');
        $I->fillField('#article','8');
        $I->click('#btn');
        $I->canSee('test');
        $I->canSee('1');
        $I->canSee('8');
        $I->click('#detal');

        //добавление поступления товара
        $I->click('#create');
        $I->fillField('#datetime','13122024');
        $I->fillField('#quantity','2');
        $I->click('#btn');
        $I->canSee('2024-12-13');
        $I->canSee('2');

        //изменение поступления товара
        $I->click('#update');
        $I->fillField('#datetime','13122024');
        $I->fillField('#quantity','3');
        $I->click('#btn');
        $I->canSee('2024-12-13');
        $I->canSee('3');

        //удаление поступления товара
        $I->click('Удалить');
        $I->dontSee('2024-12-13');
        $I->dontSee('3');
    }
}
