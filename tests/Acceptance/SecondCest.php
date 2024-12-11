<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class SecondCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function CRUD_AllGoods(AcceptanceTester $I)
    {
        //добавление товара
        $I->amOnPage("/");
        $I->click('#create');
        $I->fillField('#name','test');
        $I->fillField('#price','1');
        $I->fillField('#article','2');
        $I->click('#btn');
        $I->canSee('test');
        $I->canSee('1');
        $I->canSee('2');
        $I->click('#allgoods');

        //добавление поступления товара
        $I->click('#create');
        $I->selectOption('#goods','test');
        $I->fillField('#datetime','13122024');
        $I->fillField('#quantity','2');
        $I->click('#btn');
        $I->canSee('test');
        $I->canSee('2024-12-13');
        $I->canSee('2');

        //изменение товара
        $I->click('#update');
        $I->selectOption('#goods','test');
        $I->fillField('#datetime','13122024');
        $I->fillField('#quantity','3');
        $I->click('#btn');
        $I->canSee('test');
        $I->canSee('2024-12-13');
        $I->canSee('3');

        //удаление товара
        $I->click('Удалить');
        $I->dontSee('test');
        $I->dontSee('2024-12-13');
        $I->dontSee('3');
    }
}
