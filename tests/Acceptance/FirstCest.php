<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function Goods(AcceptanceTester $I)
    {
        //добавления товара
        $I->amOnPage("/");
        $I->click('#create');
        $I->fillField('#name','test');
        $I->fillField('#price','1');
        $I->fillField('#article','2');
        $I->click('#btn');
        $I->canSee('test');
        $I->canSee('1');
        $I->canSee('2');

        //изменение товара
        $I->click('#update');
        $I->fillField('#name','testUpdate');
        $I->fillField('#price','1');
        $I->fillField('#article','2');
        $I->click('#btn');
        $I->canSee('testUpdate');
        $I->canSee('1');
        $I->canSee('2');

        //удаление товара
        $I->click('Удалить');
        $I->dontSee('testUpdate');
        $I->dontSee('1');
        $I->dontSee('2');
    }
}
