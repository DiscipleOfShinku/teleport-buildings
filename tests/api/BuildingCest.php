<?php

class BuildingCest
{
    public function _before(ApiTester $I) {
        $I->haveHttpHeader('Content-Type', 'application/json; charset=UTF-8');
    }

    public function addBuilding(ApiTester $I) {
        $I->wantTo('Add new building');

        $I->sendPOST('/building/create', json_encode([
            'street' => 'ул. Ленина',
            'number' => '31/1',
            'floors' => 3,
            'space' => 65.6,
            'build_date' => (new DateTime())->format('Y-m-d'),
        ]));

        $I->seeResponseCodeIsSuccessful();
        $I->seeInDatabase('building', ['id' => 1]);
    }

    public function editBuilding(ApiTester $I) {
        $I->wantTo('Update building data');

        $I->sendPATCH('/building/update?id=1', json_encode([
            'floors' => 4,
        ]));

        $I->seeResponseCodeIsSuccessful();
    }

    public function getBuildings(ApiTester $I) {
        $I->wantTo('Get saved buildings');

        $I->sendGET('/building');

        $I->seeResponseContainsJson(['id' => 1, 'floors' => 4]);
    }
}
